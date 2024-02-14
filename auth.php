<?php
session_start();
require 'config.php';
cookieCheck();

if (isset($_SESSION["loginAdmin"])) {
  header('Location: admin/products/index.php');
  exit;
}
if (isset($_SESSION["loginUser"])) {
  header('Location: index.php');
  exit;
}

if (isset($_POST["submitLogin"])) {
  if (login($_POST) > 0) {
    echo "
            <script>
            alert('Login Berhasil!');
            </script>";
  } else {
    echo "<script>
            alert('Login gagal!');
            </script>";
  }
};

if (isset($_POST["submitRegis"])) {
  if (register($_POST) > 0) {
    echo "
            <script>
            alert('Registrasi Berhasil!');
            </script>";
  } else {
    echo "<script>
            alert('Registrasi gagal!');
            </script>";
  }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Login & Registration Form</title>
  <link rel="stylesheet" href="./resources/css/auth.css">
</head>

<body>
  <div class="container">
    <div class="forms">
      <!-- lOGIN -->
      <div class="form login">
        <span class="title">Masuk</span>
        <form action="#" method="post">
          <div class="input-field">
            <input type="text" name="username" placeholder="Your Username" required>
            <i class="uil uil-envelope icon"></i>
          </div>

          <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Your Password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="checkbox-text">
            <div class="checkbox-content">
              <input type="checkbox" id="logCheck">
              <label for="logCheck" class="text">Tetap masuk</label>
            </div>
          </div>

          <div class="input-field button">
            <input type="submit" name="submitLogin" value="Masuk">
          </div>
        </form>

        <!-- Submit Login -->
        <div class="login-signup">
          <span class="text">Belum daftar?
            <a href="#" class="text signup-link">Daftar Sekarang</a>
          </span>
        </div>
      </div>

      <!-- SIGN UP -->
      <div class="form signup">
        <span class="title">Daftar</span>
        <form method="post">
          <div class="input-field">
            <input type="text" name="fullname" placeholder="Masukkan nama lengkap Anda" required>
            <i class="uil uil-user"></i>
          </div>
          <div class="input-field">
            <input type="text" name="user" placeholder="Masukkan username Anda" required>
            <i class="uil uil-user"></i>
          </div>
          <div class="input-field">
            <input type="email" name="email" placeholder="Masukkan email Anda" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" class="password" name="pass" placeholder="Buat kata sandi" required>
            <i class="uil uil-lock icon"></i>
            <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
          </div>
          <div class="input-field">
            <input type="password" class="password" name="cpass" placeholder="Konfimasi kata sandi" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <!-- Submit Register -->
          <div class="input-field button">
            <input type="submit" name="submitRegis" value="Daftar">
          </div>
        </form>

        <div class="login-signup">
          <span class="text">Sudah daftar?
            <a href="#" class="text login-link">Masuk Sekarang</a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <script src="./resources/js/auth.js"></script>
</body>

</html>