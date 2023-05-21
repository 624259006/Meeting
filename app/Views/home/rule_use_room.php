<?= $this->extend('layouts/header-main') ?>
<?= $this->section('title') ?>rule use room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container">
    <h5 class="text-center">ข้อปฏิบัติในการจองห้องประชุม</h5>
    <form action="/action_page.php">
        <br>
        <br>
        <label for="fname">1. ผู้ใช้บริการต้องดำเนินการจองห้องประชุมก่อนวันที่เข้าใช้ล่วงหน้าอย่างน้อย 7 วัน เพื่อประสานงานให้ผู้ดูแล จัดเตรียมห้องประชุมได้ทัน</label>
        <br>
        <br>
        <label for="fname">2. หากต้องการยกเลิกการจองห้องประชุมต้องดำเนินการก่อนวันที่เข้าใช้ล่วงหน้าอย่างน้อย 3 วัน หากเกินกว่านี้จะ ไม่สามารถยกเลิกการจองห้องประชุมได้</label>
        <br>
        <br>
        <label for="fname">3. ผู้ใช้บริการต้องช่วยกันดูแลรักษาความสะอาดภายในห้องประชุม</label>
        <br>
        <br>
        <label for="fname">4. ผู้ใช้บริการต้องช่วยกันประหยัดไฟฟ้า โดยอนุญาตให้เปิดใช้เครื่องใช้ไฟฟ้าก่อนใช้งานล่วงหน้า 30 นาที และช่วยกันปิดเครื่องใช้ไฟฟ้าต่าง ๆ ทันทีเมื่อไม่ได้ใช้งาน</label>
        <br>
        <br>
        <label for="fname">5. กรณีที่ผู้ใช้บริการต้องการอาหารว่างเพิ่มเติม ผู้ใช้บริการต้องจัดเตรียมอาหารว่างมาเอง</label>
        <br>
        <br>
        <label for="fname">6. กรณีที่ผู้ใช้บริการต้องการเปลี่ยนรูปแบบการจัดโต๊ะหรืออุปกรณ์ภายในห้อง ผู้ใช้บริการสามารถปรับการจัดรูปแบบ ได้ด้วยตนเอง แต่เมื่อใช้งานเสร็จสิ้นแล้ว ต้องจัดโต๊ะและอุปกรณ์ภายในห้องให้เหมืองเดิมด้วย</label>
        <br>
        <br>
        <label for="fname">7. หากผู้ใช้บริการฝ่าฝืนข้อปฏิบัติและข้อห้ามในการใช้ห้องประชุม เมื่อห้องประชุมหรืออุปกรณ์ต่างๆ ได้รับความเสียหาย หรือสูญหาย ผู้ใช้บริการหรือผู้เกี่ยวข้องต้องรับผิดชอบค่าเสียหายทั้งหมดที่เกิดขึ้นตามจริง</label>
        <br>
        <br>
        <br>
        <br>
        <br>
</div>
<div class="row mt-4">
    <div class="col-lg-12 text-center">
        <input type="submit" class="btn btn-success" value="ส่งข้อความ">
        <a href="<?= base_url("profile") ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
    </div>
</div>

<?= $this->endSection() ?>