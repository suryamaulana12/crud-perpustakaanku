<?php
session_start();
require "../admin/functions.php";





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
    <div class="header"><img src="../admin/img/logo_png-removebg-previewwww.png" width=" 100" height="100" t>
      <h1>Perpustakaan Online</h1>
    </div>

    <div class="main">
      <div class="left">
        <h3 align="center">MENU</h3>
        <ul>
          <li><a href="../admin/proses-login.php" target="_blank">Login Petugas</a></li>
          <li><a href="login-umum.php" onclick="return confirm('Yakin anda mau keluar dari halaman ini?');">Logout</a></li>
          <li><a href="#">Home</a></li>
          <li><a href="daftar-buku.php">Daftar Buku</a></li>
        </ul>
      </div>

      <div class="middle">
        <h3 align="center">Artikel/Berita/Buku Terbaru</h3>
        <h2 align="center">Buku: Tere Liye - Selamat Tinggal</h2><br>
        <div align="center">
          <img src="../admin/img/selamat_tinggal.jpg" width="160" id="box">
        </div>
        <p style="margin-top: 20px;"><a href="daftar-buku.php">Baca Selengkapnya >></a></p>
      </div>

      <div class="right">
        <h3 align="center">BUKU TERPOPULER</h3>
        <ul>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Pemrograman</a></li>
          <li><a href="#">Database</a></li>
        </ul>
      </div>

    </div>
  </div>
  <div class="footer">
    <p align="center" style="margin-top: 10px;">Copyright © 2023 - PerpustakaanKu</a></p>
  </div>
  </div>
</body>

</html>