<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

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
  <title>WARUNG BUDAYA</title>
  <link rel="icon" type="image/png" href="../assets/img/icon.png">

  <!-- MY CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/tambah.css">

  <!-- SCRIPT -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <p class="navbar-brand" href="../index.php">
        ADMIN | WARUNG BUDAYA
      </p>
    </div>
  </nav>
  <!-- NAVBAR:END -->


  <!-- tambah -->
  <section id="tambah">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3>UBAH | WARUNG BUDAYA</h3>
            </div>

            <div class="card-body">
              <form method="POST" class="justify-content-center text-center" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $am['id']; ?>">
                <div class="form-group row">
                  <label for="nama" class="col-md-4 col-form-label">Nama</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="nama" autofocus autocomplete="off" required value="<?= $am['nama']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="deskripsi" class="col-md-4 col-form-label">Deskripsi</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="deskripsi" autocomplete="off" required value="<?= $am['deskripsi']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="asal_daerah" class="col-md-4 col-form-label">Asal Daerah</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="asal_daerah" autocomplete="off" required value="<?= $am['asal_daerah']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cara_memainkan" class="col-md-4 col-form-label">Cara Memainkan</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="cara_memainkan" autocomplete="off" required value="<?= $am['cara_memainkan']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="harga" class="col-md-4 col-form-label">Harga</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="harga" autocomplete="off" required value="<?= $am['harga']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="harga" class="col-md-4 col-form-label">Gambar</label>
                  <div class="col-md-6">
                    <input type="hidden" name="gambar_lama" value="<?= $am['gambar']; ?>">
                    <div class="custom-file">
                      <input type="file" name="gambar" class="custom-file-input gambar" id="customFile gambar" onchange="previewImage()">
                      <label class=" custom-file-label" for="customFile"><?= $am['gambar']; ?></label>
                    </div>
                    <img src="../assets/img/<?= $am['gambar']; ?>" width="100" class="img-preview img-thumbnail">
                  </div>
                </div>
                <button type="submit" class="btn btn-dark" name="ubah">Ubah Data</button>
                <button class="btn btn-dark back">
                  <a href="admin.php" style="text-decoration: none; color: white;">Kembali Ke Laman Admin</a>
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- tambah -->

  <!-- footer;bottom -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row pt-3">
        <div class="col text-center">
          <p> &copy; 2020 WARUNG BUDAYA | 193040174</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer;bottom -->

  <script src="../js/script.js"></script>
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
</body>

</html>