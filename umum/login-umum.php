<?php
require "../admin/functions.php";

if (isset($_POST["login"])) {
  // menangkap dari data post
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM umum WHERE username ='$username' AND password = '$password'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    header("Location: home.php");
  }
  $error = true;
}

?>


<html>

<head>
  <title>Login Anggota</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if (isset($error)) : ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Username/Password Wrong!',
      })
    </script>
  <?php endif; ?>

  <form method="POST" action="" class="form">

    <div class="tampilan">
      <div class="kepala">
        <div class="logo"></div>
        <h2 class="judul" style="font-family: ALGERIAN;">Login Anggota</h2>
      </div>
      <div class="artikel">

        <div class="kotak">
          <p><input type="text" name="username" placeholder="Masukan Username Anda" required name="nama"></p>
          <p><input type="password" name="password" placeholder="Masukan Password Anda" required name="password"></p>
          <button type="submit" name="login" class="submit" style="width: 355px; padding: 5px; background-color: #281e5a; color: white; border-radius: 10px;">LOGIN</button>
          <p style="text-align: center;">Apakah kamu sudah mempunyai akun? <a href="daftar-umum.php" style="text-decoration: none;">Daftar.</a></p>
  </form>
  </div>
  </div>

  </div>
  </div>
</body>

</html>