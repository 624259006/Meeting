<?php

namespace App\Controllers;

class home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('home/register');
    }

    public function login()
    {
        return view('home/login');
    }

    public function booking()
    {
        $data_sending = ['active' => 'booking'];
        return view('home/booking', $data_sending);
    }

    public function calendar()
    {
        $data_sending = ['active' => 'calendar'];
        return view('home/calendar', $data_sending);
    }

    public function table()
    {
        $data_sending = ['active' => 'table'];
        return view('home/table', $data_sending);
    }
    public function rule_use_room()
    {
        $data_sending = ['active' => 'rule_use_room'];
        return view('home/rule_use_room', $data_sending);
    }
}

