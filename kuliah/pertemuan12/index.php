<?php
session_start();

if (!isset($_SESSION['login'])) {

  header("Location: login.php");
  exit;
}

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
    body {
      background-color: snow;

    }

    .container h3 {
      text-align: center;
      width: 100%;
      margin-top: 90px;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3><b> DAFTAR MAHASISWA </b></h3>
    <div class="row">
      <div class="col">
        <div class="input-group mb-3">
          <a href="tambah.php" class="btn btn-outline-danger">+ Tambah Data!</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="input-group mb-3">
          <form action="" method="POST" class="input-group">
            <input type="text" class="form-control mr-sm-2" name="keyword" placeholder="Search" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" type="submit" name="cari">Search!</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <table class="table table-bordered table-info">
      <thead class="text-uppercase text-center thead-dark">
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>

        <?php if (empty($mahasiswa)) : ?>
          <tr>
            <td colspan="4">
              <p style="color: red; font-style: italic;">data mahasiswa tidak ditemukan!</p>
            </td>
          </tr>
        <?php endif; ?>

        <?php $i = 1;
        foreach ($mahasiswa as $m) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
            <td><?= $m['nama']; ?></td>
            <td>
              <a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
    </table>
    <div class="col">
      <div class="input-group mb-3">
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
</body>

</html>