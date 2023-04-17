<?php
require "../admin/functions.php";

// mengambil data anggota
$buku = mysqli_query($conn, "SELECT * FROM `buku` ");

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="Style.css">
  <title>Perpustakaan Online</title>
</head>

<body>

  <div id="container">
    <div class="header"><img src="../admin/img/logo_png-removebg-previewwww.png" width="100" height="100">
      <h1>Perpustakaan Universitas BSI</h1>
    </div>

    <div class="main">
      <div class="left">
        <h3 align="center">MENU</h3>
        <ul>
          <li><a href="../admin/proses-login.php" target="_blank">Login Petugas</a></li>
          <li><a href="login-umum.php">Logout</a></li>
          <li><a href="home.php">Home</a></li>
          <li><a href="#">Daftar Buku</a></li>
        </ul>

        <br>

        <h3 align="center">BUKU TERPOPULER</h3>
        <ul>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Pemrograman</a></li>
          <li><a href="#">Database</a></li>
          <li><a href="#">Algoritma</a></li>
          <li><a href="#">UI/UX</a></li>
        </ul>
      </div>
    </div>

    <div class="middle2">
      <h2 align="center">DAFTAR BUKU</h2><br>
      <div align="center">
      </div>
      <?php foreach ($buku as $row) : ?>
        <div class="buku" style="margin-bottom: 15px;">
          <div class="foto">
            <?= "<img src= '../admin/img/$row[gambar]' width='50' id='box' "; ?>
            <div class="judul"><a href="detail-buku.php?id=<?= $row['id']; ?>" class="judul"><?= $row["judul"]; ?></a></div>
            <div class="penulis"><?= $row["pengarang"]; ?></div>
          </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="footer">
      <p align="center">Copyright © 2018 - PerpustakaanKu</a></p>
    </div>
</body>

</html>