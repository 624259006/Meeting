<?= $this->extend('layouts/header-main') ?>
<?= $this->section('title') ?>Register to login this website<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <h5 class="text-center my-5">สมัครสมาชิก</h5>
      <?php $validation = session()->getFlashdata('validation');
          if(isset($validation)) { ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('validation') ?></div>
          <?php } ?>
      <form action="<?= base_url("user/save_register"); ?>" method="POST">
        <div class="form-group">
          <div class="row">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-firstname">ชื่อ :</label>
            </div>
            <div class="col-lg-7">
              <div class="row">
                <div class="col-lg-5">
                  <input type="text" id="input-firstname" name="firstname" class="form-control" placeholder="First name" value="<?php if(session()->getFlashdata('firstname')) { echo session()->getFlashdata('firstname'); }?>">
                </div>
                <div class="col-lg-2 text-end mt-2 px-0">
                  <label for="input-lastname">นามสกุล :</label>
                </div>
                <div class="col-lg-5">
                  <input type="text" id="input-lastname" name="lastname" class="form-control" placeholder="Last name" value="<?php if(session()->getFlashdata('lastname')) { echo session()->getFlashdata('lastname'); }?>">
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-id-card">รหัสบัตรประชาชน : </label>
            </div>
            <div class="col-lg-7">
              <input type="id-card" id="input-id-card" name="id_card" class="form-control" placeholder="ID Card" value="<?php if(session()->getFlashdata('id_card')) { echo session()->getFlashdata('id_card'); }?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-email">อีเมล : </label>
            </div>
            <div class="col-lg-7">
              <input type="email" id="input-email" name="email" class="form-control" placeholder="Email" value="<?php if(session()->getFlashdata('email')) { echo session()->getFlashdata('email'); }?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-phone">เบอร์โทร : </label>
            </div>
            <div class="col-lg-7">
              <input type="text" id="input-phone" name="phone" class="form-control" placeholder="Phone number" value="<?php if(session()->getFlashdata('phone')) { echo session()->getFlashdata('phone'); }?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-password">รหัสผ่าน : </label>
            </div>
            <div class="col-lg-7">
              <input type="password" id="input-password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-confirm-password">ยืนยันรหัสผ่าน : </label>
            </div>
            <div class="col-lg-7">
              <input type="password" id="input-confirm-password" name="confirm_password" class="form-control" placeholder="Confirm password">
            </div>
            <div class="col-lg-2"></div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" value="สมัครสมาชิก">
          </div>
        </div>
      </form>
      <div class="col-lg-2"></div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>