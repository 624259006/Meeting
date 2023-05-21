<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title'); ?></title>
    <script type="text/javascript" src="<?= base_url("script/bootstrap.bundle.min.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("script/jquery-3.6.4.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("script/sweetalert.min.js"); ?>"></script>
    <link rel="stylesheet" href="<?= base_url("style/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("style/fontawesome/css/all.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("style/basic.css"); ?>">
</head>
<body>
  <div class="container-feild">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="<?= base_url(); ?>"><img src="<?= base_url("images/MRO.png"); ?>" id="nav-logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= (!empty($active) && $active == "booking" ? "active" : "") ?>" href="<?= base_url("booking"); ?>">Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (!empty($active) && $active == "calendar" ? "active" : "") ?>" href="<?= base_url("calendar"); ?>">Calendar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (!empty($active) && $active == "table" ? "active" : "") ?>" href="<?= base_url("table"); ?>">Room Table</a>
        </li>
      </ul>
      <ul class="mb-2 mb-lg-0">
        <li>
          <a href="<?= base_url("login"); ?>" class="btn btn-warning">Login</a>
          <a href="<?= base_url("register"); ?>" class="btn btn-warning">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  </div>
  <!-- content of page -->
  <?= $this->renderSection('header-content') ?>
  <!-- footer content -->
  <footer>
        <?= view('layouts/footer-main') ?>
    </footer>
</body>
</html>
<?php if (session()->getFlashdata('swel_title')) { ?>
<script>
  $(document).ready(function() {
      swal({
        title: "<?= session()->getFlashdata('swel_title') ?>",
        text: "<?= session()->getFlashdata('swel_text') ?>",
        icon: "<?= session()->getFlashdata('swel_icon') ?>",
        button: "<?= session()->getFlashdata('swel_button') ?>",
      });
  });
</script>
<?php } ?>