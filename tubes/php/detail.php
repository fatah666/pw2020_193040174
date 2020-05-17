<?php

// Mengecek apakah ada id yang dikirimkan
// jika tidak ada maka akan dikembalikan ke index.php
if (!isset($_GET['id'])) {
  header("location: ../index.php");
}

require 'functions.php';

// Mengambil id dari url
$id = $_GET['id'];

// Melakukan query dengan parameter id yang diambil dari url
$alat_musik = query("SELECT * FROM alat_musik WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Detail Product</title>

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/detail.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="../css/all.min.css">

  <!-- SCRIPT -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        WARUNG BUDAYA
      </a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="../index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#produk">Product</a>
          <a class="nav-item nav-link btn btn-dark text-white" href="login.php">Login <i class="fas fa-sign-in-alt"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- NAVBAR:END -->

  <!-- container -->
  <div class="container">
    <div class="row pt-3">
      <div class="col p-6">
        <p>Home / <?= $alat_musik["nama"]; ?> / <b>Details</b></p>
      </div>
    </div>
  </div>
  <!-- container -->

  <!-- details -->
  <section id="details">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 pl-lg-0">
          <div class="card bg-light border-dark card-details card-right">
            <h3><?= $alat_musik["nama"] ?></h3>
            <p>harga :</p>
            <p style="color: red">IDR <?= $alat_musik["harga"]; ?>,-</p>
          </div>
          <div class="buy pt-3 text-center">
            <a href="#" class="btn btn-dark font-weight-bold">Beli</a>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card card-details">
            <h1><?= $alat_musik['nama'] ?></h1>
            <p><?= $alat_musik["asal_daerah"] ?></p>
            <div class="gambar">
              <img class="img-fluid imb-thumbnail" src="../assets/img/<?= $alat_musik['gambar'] ?>" alt="">
            </div>
            <div class="mt-5">
              <h4><b>Deskripsi : </b><?= $alat_musik["deskripsi"] ?></h4>
            </div>
          </div>
        </div>

      </div>
  </section>
  <!-- details -->

  <!-- footer;bottom -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row pt-3">
        <div class="col text-center">
          <p> &copy; 2020 WARUNG BUDAYA | 193040174</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer;bottom -->

</body>

</html>