<?php
// menghubungkan dengan file php lainnya
require 'functions.php';

// melakukan query
$alatmusik = query("SELECT * FROM alat musik");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    .add {
      margin-bottom: 10px;
    }

    .add a {
      color: #212b40;
      text-decoration: none;
      font-size: 25px;
      font-family: arial;
    }

    .add a:hover {
      color: grey;
    }
  </style>
</head>

<body>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>DESKRIPSI</th>
      <th>ASAL DAERAH</th>
      <th>CARA PEMAKAIAN</th>
      <th>HARGA</th>
    </tr>

    <?php $i = 1;
    foreach ($alatmusik as $am) :
    ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href=""><button>Ubah</button></a>
          <a href=""><button>Hapus</button></a>
        </td>
        <td><img width="100px" src="../assets/img/<?= $am["gambar"]; ?>"></td>
        <td><?= $am["nama"] ?></td>
        <td><?= $am["deskripsi"] ?></td>
        <td><?= $am["asal_daerah"] ?></td>
        <td><?= $am["cara_pemakaian"] ?></td>
        <td><?= $am["harga"] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>