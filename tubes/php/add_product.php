<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// menghubungkan dengan file php lainnya
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href = 'admin.php';
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ADMIN | WARUNG BUDAYA</title>

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/produk.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="../css/all.min.css">

  <!-- SCRIPT -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <p class="navbar-brand" href="../index.php">
        ADMIN | WARUNG BUDAYA
      </p>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link btn btn-dark mb-3 text-white" href="../index.php">Home <i class="fas fa-home text-white"></i></a>
          <a class="nav-item nav-link btn btn-dark mb-3 text-white" href="logout.php">Logout <i class="fas fa-sign-out-alt text-white"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- NAVBAR:END -->

  <!-- container -->
  <div class="row no-gutters">
    <div class="col-md-2 bg-dark pr-3 pt-4 nav-side">
      <nav class="nav flex-column ml-3 mb-5">
        <a class="nav-link side active text-white" href="admin.php"><i class="fab fa-product-hunt"></i> Products</a>
        <hr class="bg-secondary">
        <a class="nav-link side text-white" href="add_product.php"><i class="fas fa-plus-square"></i> Add Products</a>
        <hr class="bg-secondary">
        <a class="nav-link side text-white" href="add_user.php"><i class="fas fa-users"></i> User</a>
      </nav>
    </div>
    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-plus-square mr-2"></i> Add product</h3>
      <hr>

      <div class="card-body">
        <form method="POST" class="justify-content-center text-center" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="nama" class="col-md-4 col-form-label">Nama</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="nama" autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-md-4 col-form-label">Deskripsi</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="deskripsi" autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="asal_daerah" class="col-md-4 col-form-label">Asal Daerah</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="asal_daerah" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="cara_memainkan" class="col-md-4 col-form-label">Cara Memainkan</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="cara_memainkan" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="harga" class="col-md-4 col-form-label">Harga</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="harga" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="gambar" class="col-md-4 col-form-label">Gambar</label>
            <div class="col-md-6">
              <div class="custom-file">
                <input type="file" name="gambar" class="custom-file-input gambar" id="customFile gambar" onchange="previewImage()">
                <label class=" custom-file-label" for="customFile">Choose file</label>
              </div>
              <img src="../assets/img/non.png" width="100" class="img-preview img-thumbnail">
            </div>
          </div>
          <button type="submit" class="btn btn-dark" name="tambah">Add Data</button>
        </form>
      </div>

      <hr>
    </div>
  </div>
  <!-- container -->


  <script src="../js/script.js"></script>
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
</body>

</html>