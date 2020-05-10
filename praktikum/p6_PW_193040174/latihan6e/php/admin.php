<?php
// menghubungkan dengan file php lainnya
require 'functions.php';

// melakukan query
$alatmusik = query("SELECT * FROM alat_musik");

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
  <div class="add">
    <a href="tambah.php">Tambah Data</a>
  </div>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>DESKRIPSI</th>
      <th>ASAL DAERAH</th>
      <th>CARA MEMAINKAN</th>
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
        <td><?= $am["cara_memainkan"] ?></td>
        <td><?= $am["harga"] ?></td>
      </tr>
      <?php $i++ ?>
    <?php endforeach; ?>
  </table>
</body>

</html>