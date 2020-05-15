<?php
require '../function.php';
$mahasiswa = cari($_GET['keyword']);
?>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>

  <?php if (empty($mahasiswa)) : ?>
    <tr>
      <td colspan="4">
        <p style="color: red; font-style:italic;">data mahasiswa tidak ditemukan!</p>
      </td>
    </tr>
  <?php endif; ?>

  <?php $i = 1;
  foreach ($mahasiswa as $m) :
  ?>
    <tr>
      <td><?= $i; ?></td>
      <td><img width="100px" src="img/<?= $m['gambar']; ?>"></td>
      <td><?= $m['nama']; ?></td>
      <td>
        <a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a>
      </td>
    </tr>
    <?php $i++ ?>
  <?php endforeach; ?>
</table>