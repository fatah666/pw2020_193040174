<?php
require 'functions.php';
$alat_musik = cari($_GET['keyword']);
?>
<?php if (empty($alat_musik)) : ?>
  <div class="alert alert-warning text-center font-weight-bold" role="alert">
    Product not found !
  </div>
<?php else : ?>
  <div class="row text-white">
    <?php foreach ($alat_musik as $am) : ?>
      <div class="col-md-4 pt-2">
        <div class="card">
          <img class="card-img-top ml-5" src="../assets/img/<?= $am["gambar"]; ?>" alt="Card image cap">
          <div class="card-body">
            <p class="card-text text-center">
              <h5 style="font-size: 14px; text-align:center; color:black;"><?= $am["nama"]; ?></h5>
            </p>
            <p class="card-text text-center">
              <a href="ubah.php?id=<?= $am['id'] ?>" class="btn btn-dark btn-sm">Ubah</a>
              <a href="hapus.php?id=<?= $am['id'] ?>" class="btn btn-dark btn-sm" onclick="return confirm('Hapus Data ???')">Hapus </a>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>