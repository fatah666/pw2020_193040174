<?php
require 'function.php';

$id = $_GET['id'];
$am = query("SELECT * FROM alat_musik WHERE id = $id")[0];

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal diubah');
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
  <h3>Form Update Data Barang</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" id="id" value="<?= $am['id']; ?>">
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
        <label for="cara_memainkan">Cara Pemakaian</label><br>
        <input type="text" name="cara_memainkan" id="cara_memainkan" required><br><br>
      </li>
      <li>
        <label for="harga">Harga</label><br>
        <input type="text" name="harga" id="harga" required><br><br>
      </li>
      <br>
      <button type="submit" name="ubah">Ubah Data!</button>
      <button type="submit">
        <a href="../index.php" style="text-decoration: none; color: black;">Kembali</a>
      </button>
    </ul>
  </form>
</body>

</html>