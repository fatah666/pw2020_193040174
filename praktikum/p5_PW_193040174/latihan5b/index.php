<?php
// menghubungkan dengan file php lainnya
require 'assets/php/function.php';

// melakukan query
$alat_musik = query("SELECT * FROM alat musik")
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Latihan 5b</title>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>

<body>

  <h3>Alat Musik</h3>

  <table border="1px">

    <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Deskripsi</th>
      <th>Asal Daerah</th>
      <th>Cara Memainkan</th>
      <th>Harga</th>


    </tr>
    <?php $i = 1 ?>
    <?php foreach ($alat_musik as $am) : ?>
      <tr>
        <td><?= $i ?></td>
        <td><img width="100px" src="assets/img/<?= $am["gambar"]; ?>"></td>
        <td><?= $am["nama"] ?></td>
        <td><?= $am["deskripsi"] ?></td>
        <td><?= $am["asal_daerah"] ?></td>
        <td><?= $am["cara_pemakaian"] ?></td>
        <td><?= $am["harga"] ?></td>
      </tr>
      <?php $i++ ?>
    <?php endforeach ?>
  </table>
</body>

</html>