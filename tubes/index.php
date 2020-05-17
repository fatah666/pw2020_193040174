<?php
// menghubungkan dengan file php lainnya
require 'php/functions.php';
$alat_musik = query("SELECT * FROM alat_musik");


if (isset($_POST['cari']))
  $alat_musik = cari($_POST['keyword']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>WARUNG BUDAYA</title>
  <link rel="icon" type="image/png" href="assets/icon.png">

  <!-- MY CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- SCRIPT -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        WARUNG BUDAYA
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#produk">Product</a>
          <a class="nav-item nav-link btn btn-dark text-white" href="php/login.php">Login <i class="fas fa-sign-in-alt"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- NAVBAR:END -->

  <!-- Carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="assets/img/gm1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>NGAJUNGJUNG BUDAYA SORANGAN</h1>
          <p>Lorem ipsum dolor sit amet.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="assets/img/gm3.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>KUDU BANGGA BOGA BUDAYA NU MIBANDA</h1>
          <p>Lorem ipsum dolor sit amet.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="assets/img/gm2.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>HAYU NGA~BUDAYA</h1>
          <h3>WARUNG BUDAYA</h3>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Carousel:1 -->

  <!-- container -->
  <section id="produk">
    <div class="container">
      <div class="row mb-4 pt-4">
        <div class="col text-center text-white">
          <h2>PRODUK | WARUNG BUDAYA</h2>
        </div>
      </div>
      <form class="form-inline justify-content-center" method="POST">
        <input class="form-control mr-sm-2 keyword" name="keyword" size="50px" autocomplete="off" type="search" placeholder="Search product" aria-label="Search">
        <button class="btn btn-dark  my-2 my-sm-0 tombol-cari" type="submit" name="cari">Search</button>
      </form>
      <hr>
      <?php if (empty($alat_musik)) : ?>
        <div class="alert alert-danger text-center font-weight-bold" role="alert">
          Produk tidak ditemukan !
        </div>
      <?php else : ?>
        <div class="container-produk">
          <div class="row pt-4">
            <?php foreach ($alat_musik as $am) : ?>
              <div class="col-md-3 pt-5">
                <div class="card">
                  <a href="php/detail.php?id=<?= $am['id'] ?>"><img class="card-img-top ml-4 pr-4" src="assets/img/<?= $am["gambar"]; ?>" alt="Card image cap"></a>
                  <div class="card-body">
                    <p class="card-text text-center">
                      <h5 style="font-size: 12px; text-align:center;"><?= $am["nama"]; ?></h5>
                    </p>
                    <p class="card-text text-center"><a href="php/detail.php?id=<?= $am['id'] ?>" class="btn btn-dark btn-sm">Lihat detail</a></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- container:produk -->


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

  <!-- button -->


  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</body>

</html>