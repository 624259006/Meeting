<?= $this->extend('layouts/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<?php
$arr_table = array(
  1 => array(
    "ROOM_IMG_PATH" => "https://www.justcoglobal.com/wp-content/uploads/2022/06/meeting-rooms.jpg",
    "ROOM_NAME" => "มะจ๋องจองเปียกทูน่า",
    "ROOM_STATUS" => "Y",
    "ROOM_SIZE" => "เล็ก"
  ),
  2 => array(
    "ROOM_IMG_PATH" => "https://www.justcoglobal.com/wp-content/uploads/2022/06/meeting-rooms.jpg",
    "ROOM_NAME" => "มะแจ๋งกระจองอแง",
    "ROOM_STATUS" => "E",
    "ROOM_SIZE" => "กลาง"
  ),
  3 => array(
    "ROOM_IMG_PATH" => "https://www.justcoglobal.com/wp-content/uploads/2022/06/meeting-rooms.jpg",
    "ROOM_NAME" => "พิรุณคำรามสะท้านฟ้า",
    "ROOM_STATUS" => "Y",
    "ROOM_SIZE" => "เล็ก"
  ),
  4 => array(
    "ROOM_IMG_PATH" => "https://www.justcoglobal.com/wp-content/uploads/2022/06/meeting-rooms.jpg",
    "ROOM_NAME" => "แต่วทะเลโต้คลื่น",
    "ROOM_STATUS" => "B",
    "ROOM_SIZE" => "ใหญ่"
  ),
  5 => array(
    "ROOM_IMG_PATH" => "https://www.justcoglobal.com/wp-content/uploads/2022/06/meeting-rooms.jpg",
    "ROOM_NAME" => "ดุดันไม่เกรงผ้าเหลือง",
    "ROOM_STATUS" => "Y",
    "ROOM_SIZE" => "ใหญ่"
  )
);
?>

<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h5 class="text-center my-5">ข้อมูลห้องประชุม</h5>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="mt-2 float-end">(เล็ก กลาง ใหญ่)</label>
            <select class="form-control float-end mx-2" style="width: 100px;">
              <option value="" class="text-center">- select -</option>
              <?php for ($i = 1; $i <= 5; $i++) { ?>
                <option value="<?= $i; ?>"><?= "Sometext"; ?></option>
              <?php } ?>
            </select>
            <label class="mt-2 float-end">ขนาดของห้อง</label>
          </div>
        </div>
      </div>
      <table class="table table-main-primary table-striped table-hover mt-3">
        <thead>
          <tr class="text-center">
            <th>รายชื่อห้องประชุม</th>
            <th>สถานะห้องประชุม</th>
            <th>รายละเอียดห้อง</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($arr_table as $key => $val) { ?>
            <tr>
              <td>
                <div class="row">
                  <div class="col-lg-5 text-center">
                    <img src="<?= $val["ROOM_IMG_PATH"]; ?>" class="img-room">
                  </div>
                  <div class="col-lg-5">
                    <label class="btn-roomname user-select-none <?php if ($val["ROOM_SIZE"] == "เล็ก") {
                                                                  echo "btn-roomname-success";
                                                                } else if ($val["ROOM_SIZE"] == "กลาง") {
                                                                  echo "btn-roomname-warning";
                                                                } else if ($val["ROOM_SIZE"] == "ใหญ่") {
                                                                  echo "btn-roomname-pink";
                                                                } ?>"><?= (!empty($val["ROOM_NAME"])) ? "ห้องประชุม " . $val["ROOM_NAME"] : "<font color='red'>ไม่มีชื่อ</font>"; ?></label>
                    <label class="text-end d-block">
                      <?php if (!empty($val["ROOM_SIZE"])) { ?>
                        ห้องประชุมขนาด<?= $val["ROOM_SIZE"]; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>
              </td>
              <td class="text-center">
                <!-- B = Booked, Y = Can use, E = Edit -->
                <?php if ($val["ROOM_STATUS"] == "Y") { ?>
                  <label class="btn-status btn-status-success user-select-none">ใช้งานได้</label>
                <?php } else if ($val["ROOM_STATUS"] == "B") { ?>
                  <label class="btn-status btn-status-warning user-select-none">จองแล้ว</label>
                <?php } else if ($val["ROOM_STATUS"] == "E") { ?>
                  <label class="btn-status btn-status-danger user-select-none">ปิดปรับปรุง</label>
                <?php } ?>
              </td>
              <td class="text-center"><a href="<?= base_url("room/detail/" . $key); ?>" class="clear-hyperlink"><i class="fa-solid fa-landmark fa-2xl mb-4"></i><br>คลิกที่นี่<br>เพื่อดูรายละเอียดเพิ่มเติม</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
      <div class="col-lg-1"></div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>