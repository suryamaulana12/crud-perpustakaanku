<?php
session_start();

require "functions.php";

// apakah tombol tambah sudah ditekan apa belum
if (isset($_GET["submit"])) {
    if (tambahPengarang($_GET) > 0) {
        $true = true;
    } else {
        echo "<script>
    alert('Data gagal ditambahkan!');
    document.location.href = 'halaman-pengarang.php';
  </script>";
    }
}

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
        <title>Perpustakaan | Tambah Pengarang</title>
        <!-- Custom fonts for this template-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <?php if (isset($true)) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data anda berhasil ditambahkan!',
                timer: 1500,
            }).then(() => {
                window.location = "halaman-pengarang.php";
            })
        </script>
    <?php endif; ?>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row ini bagian yang harus diisi-->
                    <div class="row  justify-content-center" style="margin-top: -40px;">
                        <!-- Greeting -->
                        <div class="col-7 mb-5">
                            <h2 style="font-weight: bold;  margin-top: 80px; text-align: center; margin-bottom: 40px;">TAMBAH DATA PENGARANG</h2>

                            <form action="" method="GET" enctype="multipart/form-data">

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Masukan Nama" aria-label="nama" aria-describedby="basic-addon1" name="nama" required>
                                </div>

                                <label for="">Masukan Jenis Kelamin :</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-laki">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault12" value="Perempuan">
                                    <label class="form-check-label" for="flexRadioDefault12">
                                        Perempuan
                                    </label>
                                </div>

                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                                    <input type="text" class="form-control" placeholder="Masukan Alamat" aria-label="usia" aria-describedby="basic-addon1" name="alamat" required>
                                </div>

                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                    <input type="text" class="form-control" placeholder="Masukan Karya Terpopuler Pengarang" aria-label="alamat" aria-describedby="basic-addon1" name="karya_populer" required>
                                </div>

                                <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                                <a href="halaman-pengarang.php" class="btn btn-danger">Kembali</a>
                            </form>



                        </div>
                    </div>
                    <!-- End Content Row -->

                </div>
                <!-- End Page Content -->
                <?php include "footer.php"; ?>
            </div>
            <!-- End Content Wrapper -->


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