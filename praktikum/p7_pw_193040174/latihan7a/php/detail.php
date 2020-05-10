<?php

// Mengecek apakah ada id yang dikirimkan
// jika tidak ada maka akan dikembalikan ke index.php
if (!isset($_GET['id'])) {
  header("location: ../index.php");
}

require 'function.php';

// Mengambil id dari url
$id = $_GET['id'];

// Melakukan query dengan parameter id yang diambil dari url
$alatmusik = query("SELECT * FROM alat_musik WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <h1 align="center">Alat Musik</h1>
    <div class="display">
      <img width="100px" src="../img/<?= $alatmusik['gambar'] ?>" alt="">
    </div>
    <div class="keterangan">
      <p><?= $alatmusik['nama'] ?></p>
      <p><?= $alatmusik["deskripsi"] ?></p>
      <p><?= $alatmusik["asal_daerah"] ?></p>
      <p><?= $alatmusik["cara_memainkan"] ?></p>
      <p><?= $alatmusik["harga"] ?></p>
    </div>

    <div class="clear"></div>

    <button class="back"><a href="../index.php">Kembali</a></button>
  </div>
</body>

</html>