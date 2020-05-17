<?php
session_start();

require 'functions.php';

if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}

if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  // ambil username berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' ");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($hash === hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);

    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);
    }

    // jika remember dicentang
    if (isset($_POST['remember'])) {
      setcookie('username', $row['username'], time() + 60 * 60 * 24);
      $hash = hash('sha256', $row['id']);
      setcookie('hash', $hash, time() + 60 * 60 * 24);
    }


    if (hash('sha256', $row['id']) == $_SESSION['hash']) {
      header("Location: admin.php");
      die;
    }
    header("Location: ../index.php");
    die;
  }
  $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/all.min.css">
</head>

<body>
  <div class="login">
    <form action="" method="POST">
      <?php if (isset($login['error'])) : ?>
        <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
      <?php endif; ?>
      <div class="avatar">
        <i class="fa fa-user"></i>
      </div>
      <h2>Login Form</h2>
      <div class="box-login">
        <i class="fas fa-envelope"></i>
        <input type="text" placeholder="User name" name="username" autofocus autocomplete="off" required>
      </div>
      <div class="box-login">
        <i class="fas fa-lock"></i>
        <input type="Password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" name="submit" class="btn-login">Login</button>
      <div class="bottom">
        <a href="registrasi.php">Registrasi</a>
      </div>
  </div>
  </form>
</body>

</html>