<?php

namespace App\Controllers;

use App\Models\UserModel;

class user extends BaseController
{
    public function save_register()
    {
        $session = session();
        helper(['form']);
        $rules = [
            'firstname' => [
                'rules' => 'required|min_length[2]|max_length[25]',
                'errors' => [
                    'required' => 'โปรดระบุชื่อ!',
                    'min_length' => 'โปรดระบุชื่อที่มีความยาวอย่างน้อย 2 ตัวอักษร',
                    'max_length' => 'โปรดระบุชื่อที่มีความยาวไม่เกิน 25 ตัวอักษร',
                ],
            ],
            'lastname' => [
                'rules' => 'required|min_length[2]|max_length[25]',
                'errors' => [
                    'required' => 'โปรดระบุนามสกุล!',
                    'min_length' => 'โปรดระบุนามสกุลที่มีความยาวอย่างน้อย 2 ตัวอักษร',
                    'max_length' => 'โปรดระบุนามสกุลที่มีความยาวไม่เกิน 25 ตัวอักษร',
                ],
            ],
            'id_card' => [
                'rules' => 'required|min_length[13]|max_length[13]',
                'errors' => [
                    'required' => 'โปรดระบุรหัสบัตรประชาชน!',
                    'min_length' => 'โปรดระบุรหัสบัตรประชาชนที่มีความยาวอย่างน้อย 13 ตัวอักษร',
                    'max_length' => 'โปรดระบุรหัสบัตรประชาชนที่มีความยาวไม่เกิน 13 ตัวอักษร',
                ],
            ],
            'email' => [
                'rules' => 'required|min_length[5]|max_length[50]|valid_email',
                'rules' => 'required|min_length[5]|max_length[50]|valid_email|is_unique[USERS.EMAIL]',
                'errors' => [
                    'required' => 'โปรดระบุอีเมล!',
                    'valid_email' => 'รูปแบบของอีเมลไม่ถูกต้อง!',
                    'is_unique' => 'อีเมลนี้ถูกใช้แล้ว!',
                ],
            ],
            'phone' => [
                'rules' => 'required|min_length[10]|max_length[10]|is_unique[USERS.PHONE]',
                'errors' => [
                    'required' => 'โปรดระบุหมายเลขโทรศัพท์!',
                    'min_length' => 'เบอร์โทรติดต่อต้องมีจำนวน 10 ตัวอักษร!',
                    'max_length' => 'เบอร์โทรติดต่อต้องมีจำนวน 10 ตัวอักษร!',
                    'is_unique' => 'หมายเลขโทรศัพท์นี้ถูกใช้แล้ว!',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[30]',
                'errors' => [
                    'required' => 'โปรดระบุรหัสผ่าน!',
                    'min_length' => 'รหัสผ่านต้องมีอย่างน้อย 5 ตัวอักษร!',
                    'max_length' => 'รหัสผ่านต้องไม่เกิน 30 ตัวอักษร!',
                ],
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'โปรดยืนยันรหัสผ่าน!',
                    'matches' => 'รหัสผ่านไม่ตรงกัน!',
                ],
            ],
        ];

        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');
        $id_card = $this->request->getVar('id_card');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $password = $this->request->getVar('password');

        if ($this->validate($rules)) {
            $user_model = new UserModel();
            $data_users = $user_model->where('Email', $this->request->getVar('email'))->first();
            if (isset($data_users)) {
                $session->setFlashdata('swel_title', 'เกิดข้อผิดพลาด!');
                $session->setFlashdata('swel_text', 'อีเมลนี้ถูกใช้แล้ว!');
                $session->setFlashdata('swel_icon', 'error');
                $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
                return redirect()->to('/register');
            } else {
                $data[] = [
                    'FIRSTNAME' => $firstname,
                    'LASTNAME' => $lastname,
                    'ID_CARD' => $id_card,
                    'EMAIL' => $email,
                    'PHONE' => $phone,
                    'PASSWORD' => $password,
                    'IP_ADDRESS' => $this->request->getIPAddress(), // $_SERVER['REMOTE_ADDR']
                ];
                $data_save_user = $user_model->create_user($data);
                if ($data_save_user) {
                    $session->setFlashdata('swel_title', 'สำเร็จ!');
                    $session->setFlashdata('swel_text', 'สมัครสมาชิกสำเร็จแล้ว คุณสามารถลงชื่อเข้าใช้งานระบบได้ในขณะนี้');
                    $session->setFlashdata('swel_icon', 'success');
                    $session->setFlashdata('swel_button', 'ดำเนินการต่อ');
                    return redirect()->to('/login');
                } else {
                    $session->setFlashdata('swel_title', 'เกิดข้อผิดพลาด!');
                    $session->setFlashdata('swel_text', 'ไม่สามารถลงทะเบียนเข้าใช้งานระบบได้ โปรดติดต่อผู้ดูแลระบบ');
                    $session->setFlashdata('swel_icon', 'error');
                    $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
                    return redirect()->to('/login');
                }
            }
        } else {
            $validation = $this->validator->listErrors();
            $session->setFlashdata('validation', $validation);
            if (isset($firstname)) {
                $session->setFlashdata('firstname', $firstname);
            }
            if (isset($lastname)) {
                $session->setFlashdata('lastname',  $lastname);
            }
            if (isset($id_card)) {
                $session->setFlashdata('id_card', $id_card);
            }
            if (isset($email)) {
                $session->setFlashdata('email', $email);
            }
            if (isset($phone)) {
                $session->setFlashdata('phone', $phone);
            }
            return redirect()->to('/register');
        }
    }

    public function profile()
    {
        return view('user/profile');
    }

    public function edit()
    {
        return view('user/edit');
    }
    public function save_edit()
    {
        $session = session();
        $session->setFlashdata('swel_title', 'เกิดข้อผิดพลาด!');
        $session->setFlashdata('swel_text', 'ไม่สามารถลงทะเบียนเข้าใช้งานระบบได้ โปรดติดต่อผู้ดูแลระบบ');
        $session->setFlashdata('swel_icon', 'error');
        $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
        return redirect()->to('/profile');
    }
    public function report()
    {
        return view('user/report');
    }
}
