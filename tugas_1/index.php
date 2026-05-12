<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">

  <title>My CV Web</title>

  <!-- BOOTSTRAP -->
  <link href="css/bootstrap.min.css"
        rel="stylesheet" />

  <!-- ICON -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

<?php

include_once 'koneksi.php';

// MODEL
include_once 'models/Pendidikan.php';
include_once 'models/Pengalaman.php';

?>

<div class="container-fluid">

  <!-- HEADER -->
  <div class="row">

    <div class="col-md-12">

      <?php include_once 'header.php'; ?>

    </div>

  </div>

  <!-- MENU -->
  <div class="row">

    <div class="col-md-12">

      <?php include_once 'menu.php'; ?>

    </div>

  </div>

  <br>

  <!-- CONTENT -->
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-3">

      <?php include_once 'sidebar.php'; ?>

    </div>

    <!-- MAIN CONTENT -->
    <div class="col-md-9">

      <?php

      $hal = $_GET['hal'] ?? 'home';
      $file = $hal . '.php';

      if (file_exists($file)) {

        include_once $file;

      } else {

        echo "
        <div class='alert alert-danger'>
          Halaman tidak ditemukan
        </div>";

      }

      ?>

    </div>

  </div>

  <br>

  <!-- FOOTER -->
  <div class="row">

    <div class="col-md-12">

      <?php include_once 'footer.php'; ?>

    </div>

  </div>

</div>

<!-- JS -->
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>