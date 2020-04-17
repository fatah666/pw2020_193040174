<?php
// Mengecek apakah ada id yang dikirimkan
// Jika tidak maka akan dikembalikan ke halaman index.php
if (!isset($_GET['harga'])) {
  header("location: ../index.php");
  exit;
}
require 'function.php';

// Mengambil id dari url
$harga = $_GET["harga"];

// melakukan query dengan parameter id yang diambil dari url
$alat_musik = query("SELECT * FROM alat musik WHERE harga = $harga")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan 5c</title>

</head>

<body>
  <div class="container">
    <div class="foto">
      <img src="../assets/img/<?= $alat_musik['gambar']; ?>" width="120">
    </div>
    <div class="keterangan">
      <p><?= $alat_musik["id"]; ?></p>
      <p><?= $alat_musik["nama"]; ?></p>
      <p><?= $alat_musik["deskripsi"]; ?></p>
      <p><?= $alat_musik["asal_daerah"]; ?></p>
      <p><?= $alat_musik["cara_pemakaian"]; ?></p>
    </div>

    <button class="tombol-kembali"><a href="../index.php">Kembali</a></button>
  </div>

</body>

</html>