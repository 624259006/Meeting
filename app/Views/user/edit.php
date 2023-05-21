<?= $this->extend('layouts/header-main') ?>
<?= $this->section('title') ?>Edit to a Profile<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <h5 class="text-center my-5">แก้ไขข้อมูลส่วนตัว</h5>
            <form action="<?= base_url("user/save_edit"); ?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 text-end mt-2">
                            <label for="input-firstname">ชื่อ :</label>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" id="input-firstname" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4 text-end mt-2">
                            <label for="input-lastname">นามสกุล : </label>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" id="input-lastname" class="form-control" placeholder="Last name">
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4 text-end mt-2">
                            <label for="input-email">อีเมล : </label>
                        </div>
                        <div class="col-lg-5">
                            <input type="email" id="input-email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 text-center">
                        <input type="submit" class="btn btn-success" value="บันทึกข้อมูล">
                        <a href="<?= base_url("profile")?>" class="btn btn-danger">ยกเลิก</a>
                    </div>
                </div>
            </form>
            <div class="col-lg-1"></div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>