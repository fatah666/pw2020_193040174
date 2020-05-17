<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// menghubungkan dengan file php lainnya
require 'functions.php';
$alat_musik = query("SELECT * FROM alat_musik");

if (isset($_POST['cari']))
  $alat_musik = cari($_POST['keyword']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>SELAMAT DATANG ADMIN | WARUNG BUDAYA</title>
  <link rel="icon" type="image/png" href="../assets/img/icon.png">

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/admin.css">

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
        WARUNG BUDAYA
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
      <h3><i class="fab fa-product-hunt mr-2"></i>PRODUCTS</h3>
      <form class="form-inline pt-4" method="POST">
        <input class="form-control mr-sm-2 keyword" name="keyword" size="50px" autocomplete="off" type="search" placeholder="Search product" aria-label="Search">
        <button class="btn btn-dark  my-2 my-sm-0 tombol-cari" type="submit" name="cari">Search</button>
      </form>
      <?php if (empty($alat_musik)) : ?>
        <div class="alert alert-warning text-center font-weight-bold" role="alert">
          Product not found !
        </div>
      <?php else : ?>
        <hr>
        <div class="container-admin">
          <div class="row text-white">
            <?php foreach ($alat_musik as $am) : ?>
              <div class="col-md-4 pt-2">
                <div class="card">
                  <img class="card-img-top ml-5" src="../assets/img/<?= $am["gambar"]; ?>" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text text-center">
                      <h5 style="font-size: 14px; text-align:center; color:black;"><?= $am["nama"]; ?></h5>
                    </p>
                    <p class="card-text text-center">
                      <a href="ubah.php?id=<?= $am['id'] ?>" class="btn btn-dark btn-sm">Ubah</a>
                      <a href="hapus.php?id=<?= $am['id'] ?>" class="btn btn-dark btn-sm" onclick="return confirm('Hapus Data ???')">Hapus</a>
                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
      <hr>

    </div>
  </div>
  <!-- container -->


  <script src="../js/script_admin.js"></script>
</body>

</html>