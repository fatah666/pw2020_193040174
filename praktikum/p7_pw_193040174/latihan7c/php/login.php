<?php
session_start();
require 'function.php';
// melakukan pengecekan apakah user salah melakukan login jika sudah redirect ke halaman admin
if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}
// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  // ambil username berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($hash === hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}

// login
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  // mencocokan USERNAME dan PASSWORD
  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);
      // jika remember me dicentang
      if (isset($_POST['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }
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
  <style>
    body {
      background-color: orange;
    }

    .login {
      background-color: white;
      width: 350px;
      padding: 20px;
      margin: auto;
      margin-top: 100px;
      border: 2px solid black;
      font-size: 18px;
      border-radius: 5px;
    }

    h3 {
      background-color: grey;
      text-align: center;
      color: white;
      padding: 10px;
      border-radius: 7px;
    }

    table {
      width: 200px;
      padding: 12px 10px;
      box-sizing: border-box;
      font-size: 18px;
    }

    button[type=submit] {
      background-color: grey;
      width: 100%;
      height: 40px;
      text-align: center;
      font-size: 20px;
      border-radius: 18px;
      color: white;

    }

    .remember {
      color: blue;
    }
  </style>
</head>

<body>
  <div class="login">
    <h3>Form Login</h3>
    <form action="" method="post">
      <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username atau password salah!</p>
      <?php endif; ?>
      <table>
        <tr>
          <td><label for="username">Username</label></td>
          <td>:</td>
          <td><input type="text " name="username"></td>
        </tr>
        <tr>
          <td><label for="password">Password</label></td>
          <td>:</td>
          <td><input type="password" name="password"></td>
        </tr>
      </table>
      <div class="remember">
        <input type="checkbox" name="remember">
        <label for="remember">Remember me</label>
      </div>
      <br>
      <button type="submit" name="submit">Log in</button>
      <div>
        <p>Don't have an account? Register <a href="registrasi.php">Now</a></p>
      </div>
    </form>
  </div>
</body>

</html>