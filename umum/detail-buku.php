<?php
require "../admin/functions.php";

// ambil data get diurl
$id = $_GET["id"];

// query data buku berdasarkan id
$bku = query("SELECT * FROM buku WHERE id = $id ")[0];

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
          <li><a href="daftar-buku.php">Daftar Buku</a></li>
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
      <h2 align="center">DETAIL BUKU</h2><br>
      <div align="center">
      </div>
      <table border="1" cellspacing="0">
        <tr>
          <td>ID Buku</td>
          <td><?php echo $bku['id']; ?></td>
          <td rowspan="9">
            <div class="pull-right image">
              <img src="../admin/img/<?= $bku['gambar']; ?>" class="img-rounded" height="310" width="250" alt="User Image" />
            </div>
          </td>
        </tr>
        <tr>
          <td width="250">Judul</td>
          <td width="550"><?php echo $bku['judul']; ?></td>
        </tr>
        <tr>
          <td>Pengarang</td>
          <td><?php echo $bku['pengarang']; ?></td>
        </tr>
        <tr>
          <td>Penerbit</td>
          <td><?php echo $bku['penerbit']; ?></td>
        </tr>
        <tr>
          <td>Tahun Terbit</td>
          <td><?php echo $bku['tahun_terbit']; ?></td>
        </tr>
      </table>

      <div style="text-align: right; margin-top: 10px">
        <button type="submit"><a href="<?= $bku['link']; ?>" style="font-size: 15px; color:black; padding: 10px; " class="baca" target="_blank">Baca</a></button>
        <button type="submit"><a href="daftar-buku.php" style="font-size: 15px; color: black; padding: 10px;">Kembali</a></button>
      </div>

    </div>
    <footer>
      <div class="footer">
        <p align="center" id="footer">Copyright © 2018 - PerpustakaanKu</a></p>
      </div>
    </footer>
</body>

</html>