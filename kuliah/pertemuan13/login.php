<?php
session_start();

if (isset($_SESSION['login'])) {

  header("Location: index.php");
  exit;
}

require 'function.php';

// ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
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
      background-color: burlywood;
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
      background-color: brown;
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
      background-color: dodgerblue;
      width: 100px;
      height: 40px;
      text-align: center;
      font-size: 20px;
      margin-left: 90px;
      border-radius: 18px;
      color: white;

    }
  </style>

</head>

<body>
  <div class="login">
    <h3>Form Login</h3>
    <form action="" method="POST">
      <?php if (isset($login['error'])) : ?>
        <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
      <?php endif; ?>
      <ul>
        <li>
          <label>
            Username :
            <input type="text" name="username" autofocus autocomplete="off" required>
          </label>
        </li><br>
        <li>
          <label>
            Password :
            <input type="password" name="password" required>
          </label>
        </li><br>
        <li>
          <button type="submit" name="login">Login</button>
        </li><br>
        <li>
          <a href="registrasi.php">Tambah User Baru</a>
        </li>
      </ul>
    </form>
  </div>
</body>

</html>