<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('user baru berhasil ditambahkan. silahkan login!');
            document.location.href = 'login.php';
        </script>";
  } else {
    echo 'user gagal ditambahkan!';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/all.min.css">
</head>

<body>
  <form action="" method="POST">
    <div class="login">
      <div class="avatar">
        <i class="fa fa-user"></i>
      </div>
      <h2>Form Registrasi</h2>
      <div class="box-login">
        <i class="fas fa-envelope"></i>
        <input type="text" placeholder="User name" name="username" autofocus autocomplete="off" required>
      </div>
      <div class="box-login">
        <i class="fas fa-lock"></i>
        <input type="Password" name="password1" placeholder="Password" required>
      </div>
      <div class="box-login">
        <i class="fas fa-check-circle"></i>
        <input type="Password" name="password2" placeholder="Verifikasi Password" required>
      </div>
      <button type="submit" name="registrasi" class="btn-login">Registrasi</button>
      <div class="bottom">
        <p class="mt-3 font-weight-normal">Already have an account?<a href="login.php">Login now</a></p>
      </div>
    </div>
  </form>
</body>

</html>