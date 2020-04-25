<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href = 'admin.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Form Tambah Data Barang</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label for="gambar">Gambar</label><br>
        <input type="text" name="gambar" id="gambar" required><br><br>
      </li>
      <li>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" required><br><br>
      </li>
      <li>
        <label for="deskripsi">Deskripsi</label><br>
        <input type="text" name="deskripsi" id="deskripsi" required><br><br>
      </li>
      <li>
        <label for="asal_daerah">Asal Daerah</label><br>
        <input type="text" name="asal_daerah" id="asal_daerah" required><br><br>
      </li>
      <li>
        <label for="cara_pemakaian">Cara Pemakaian</label><br>
        <input type="text" name="cara_pemakaian" id="cara_pemakaian" required><br><br>
      </li>
      <li>
        <label for="harga">Harga</label><br>
        <input type="text" name="harga" id="harga" required><br><br>
      </li>
      <br>
      <button type="submit" name="tambah">Tambah Data!</button>
      <button type="submit">
        <a href="index.php" style="text-decoration: none; color: black;">Kembali</a>
      </button>
    </ul>
  </form>
</body>

</html>