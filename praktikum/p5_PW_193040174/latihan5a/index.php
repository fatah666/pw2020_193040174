<?php
// Melakukan koneksi ke database
$conn = mysqli_connect("localhost", "root", "") or die("koneksi ke DB gagal");

// Memilih database
mysqli_select_db($conn, "PW_193040174") or die("Dtabase salah!");

// query mengambbil objek dari tabel didalam database
$result = mysqli_query($conn, "SELECT * FROM alat_musik")
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Latihan 5a</title>
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
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $i ?></td>
        <td><img width="100px" src="assets/img/<?= $row["gambar"]; ?>"></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["deskripsi"] ?></td>
        <td><?= $row["asal_daerah"] ?></td>
        <td><?= $row["cara_memainkan"] ?></td>
        <td><?= $row["harga"] ?></td>

      </tr>
      <?php $i++ ?>
    <?php endwhile ?>
  </table>
  <h5 align="center"></h5>
</body>

</html>