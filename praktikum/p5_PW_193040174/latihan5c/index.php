<?php
// menghubungkan dengan file php lainnya
require 'assets/php/function.php';

// melakukan query
$alat_musik = query("SELECT * FROM alat musik")
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan 5c</title>
</head>

<body>
  <h2 align="center"> DAFTAR ALAT MUSIK </h2>
  <?php foreach ($alat_musik as $row) : ?>
    <p class="merk_barang">
      <a href="assets/php/detail.php?id=<?= $row["harga"] ?>">
        <?= $row["nama"] ?>
      </a>
    </p>
  <?php endforeach; ?>

</body>

</html>