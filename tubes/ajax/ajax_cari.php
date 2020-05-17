<?php
require '../php/functions.php';
$alat_musik = cari($_GET['keyword']);
?>
<?php if (empty($alat_musik)) : ?>
  <div class="alert alert-danger text-center font-weight-bold" role="alert">
    Product not found !
  </div>
<?php else : ?>
  <div class="row pt-4">
    <?php foreach ($alat_musik as $am) : ?>
      <div class="col-md-3 pt-2">
        <div class="card">
          <a href="php/detail.php?id=<?= $am['id'] ?>"><img class="card-img-top ml-5" src="assets/img/<?= $am["gambar"]; ?>" alt="Card image cap"></a>
          <div class="card-body">
            <p class="card-text text-center">
              <h5 style="font-size: 12px; text-align:center;"><?= $am["nama"]; ?></h5>
            </p>
            <p class="card-text text-center"><a href="php/detail.php?id=<?= $am['id'] ?>" class="btn btn-warning btn-sm">View details</a></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>