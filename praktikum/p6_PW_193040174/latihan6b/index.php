<?php
// menghubungkan dengan file php lainnya
require 'php/functions.php';

// melakukan query
$alatmusik = query("SELECT * FROM alat_musik");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h1 align="center">Alat Musik</h3>
      <?php foreach ($alatmusik as $am) : ?>
        <p class="nama">
          <a href="php/detail.php?id=<?= $am['id'] ?>">
            <?= $am['nama'] ?>
          </a>
        </p>
      <?php endforeach; ?>
  </div>
</body>

</html>