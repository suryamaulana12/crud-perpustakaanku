<?php
// menghubungkan dengan koneksi
include "../config/koneksi.php";
// mengaktifkan session php
session_start();

require "functions.php";

if ($_SESSION['status'] != "login") {
  header("location:../");
}

// mengambil data anggota
$buku = mysqli_query($conn, "SELECT * FROM `anggota` ");

// menghitung data barang
$jumlah_anggota = mysqli_num_rows($buku);

// menghitung data buku
$buku1 = mysqli_query($conn, "SELECT * FROM `buku` ");

$jumlah_buku = mysqli_num_rows($buku1);

// menghitung data penerbit
$penerbit = mysqli_query($conn, "SELECT * FROM `penerbit` ");

$jumlah_penerbit = mysqli_num_rows($penerbit);

// menghitung data pengarang
$pengarang = mysqli_query($conn, "SELECT * FROM `pengarang` ");

$jumlah_pengarang = mysqli_num_rows($pengarang);

// menghitung data petugas
$petugas = mysqli_query($conn, "SELECT * FROM `petugas` ");

$jumlah_petugas = mysqli_num_rows($petugas);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <head>
    <title>Perpustakaan | Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
      .card-body-icon {
        position: absolute;
        z-index: 0;
        top: 25px;
        right: 10px;
        opacity: 0.4;
        font-size: 90px;
      }
    </style>
  </head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include "sidebar.php"; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "topbar-khusus.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Dashboard Perpustakaan Online</h1>
          </div>
          <hr>

          <!-- Content Row ini bagian yang harus diisi-->
          <div class="row text-white">
            <!-- Greeting -->


            <div class="card bg-info mr-5 ml-5" style="width: 18rem;">
              <div class="card-body">
                <div class="card-body-icon"><i class="fas fa-users "></i></div>
                <h5 class="card-title">JUMLAH ANGGOTA</h5>
                <div class="display-4" style="font-weight: bold;"><?php echo $jumlah_anggota; ?></div>
                <a href="halaman-anggota.php" style="text-decoration: none;">
                  <p class="card-text text-white" text-white>Lihat Detail <i class="fas fa-angle-double-right ml-1"></i></p>
                </a>
              </div>
            </div>


            <div class="card bg-danger mr-5" style="width: 18rem;">
              <div class="card-body">
                <div class="card-body-icon"><i class="fas fa-book "></i></div>
                <h5 class="card-title">JUMLAH BUKU</h5>
                <div class="display-4" style="font-weight: bold;"><?= $jumlah_buku; ?></div>
                <a href="halaman-buku.php" style="text-decoration: none;">
                  <p class="card-text text-white" text-white>Lihat Detail <i class="fas fa-angle-double-right ml-1"></i></p>
                </a>
              </div>
            </div>

            <div class="card bg-success" style="width: 18rem;">
              <div class="card-body">
                <div class="card-body-icon"><i class="fas fa-landmark "></i></div>
                <h5 class="card-title">JUMLAH PENERBIT</h5>
                <div class="display-4" style="font-weight: bold;"><?= $jumlah_penerbit; ?></div>
                <a href="halaman-penerbit.php" style="text-decoration: none;">
                  <p class="card-text text-white" text-white>Lihat Detail <i class="fas fa-angle-double-right ml-1"></i></p>
                </a>
              </div>
            </div>

            <div style="margin-left: 200px;">
              <div class="card bg-warning mt-4" style="width: 18rem;">
                <div class="card-body">
                  <div class="card-body-icon"><i class="fas fa-users "></i></div>
                  <h5 class="card-title">JUMLAH PENGARANG</h5>
                  <div class="display-4" style="font-weight: bold;"><?= $jumlah_pengarang; ?></div>
                  <a href="halaman-pengarang.php" style="text-decoration: none;">
                    <p class="card-text text-white" text-white>Lihat Detail <i class="fas fa-angle-double-right ml-1"></i></p>
                  </a>
                </div>
              </div>
            </div>

            <div style="margin-left: 550px; margin-top: -180px">
              <div class="card bg-secondary mt-4" style="width: 18rem;">
                <div class="card-body">
                  <div class="card-body-icon"><i class="fas fa-users "></i></div>
                  <h5 class="card-title">JUMLAH PETUGAS</h5>
                  <div class="display-4" style="font-weight: bold;"><?= $jumlah_petugas; ?></div>
                  <a href="halaman-petugas.php" style="text-decoration: none;">
                    <p class="card-text text-white" text-white>Lihat Detail <i class="fas fa-angle-double-right ml-1"></i></p>
                  </a>
                </div>
              </div>
            </div>

          </div>
          <!-- End Content Row -->

        </div>
        <!-- End Page Content -->
      </div>
      <!-- End Content Wrapper -->
      <?php include "footer.php"; ?>

    </div>
    <!-- End Main Content -->
  </div>
  <!-- End Page Wrapper -->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>