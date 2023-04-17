<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <head>
    <title>Perpustakaan | Edit Buku</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  <?php
  session_start();

  require "functions.php";

  // ambil _POST get diurl
  $id = $_GET["id"];

  // query  _POST buku berdesarkan id
  $bku = query("SELECT * FROM buku WHERE id = $id ")[0];

  // apakah tombol submit sudah ditekan
  if (isset($_POST["submit"])) {
    if (editBuku($_POST) > 0) {
      echo "<script>
    alert('_POST berhasil diubah');
    document.location.href = 'halaman-buku.php';
</script>";
    }
  } else {
    "<script>
            alert('_POST gagal diubah');
            document.location.href = 'halaman-buku.php';
        </script>";
  }

  if (isset($_POST["edit"])) {
    $judul = htmlspecialchars($_POST["judul"]);
    $pengarang = htmlspecialchars($_POST["pengarang"]);
    $penerbit = htmlspecialchars($_POST["penerbit"]);
    $genre = htmlspecialchars($_POST["genre"]);
    $tanggal = date('d/m/Y', strtotime($_POST["tahun_terbit"]));

    if ($_FILES['gambar']['name']) {
      $ambil_data = mysqli_query($conn, "SELECT * FROM buku WHERE id = '$id'");
      $data_gambar = mysqli_fetch_array($ambil_data);
      unlink('img/' . $data_gambar["gambar"]);
      $folder_gambar = "img/";
      $pp = uniqid() . $_FILES["gambar"]["name"];
      $target_file = $folder_gambar . basename($pp);
      if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $a = mysqli_query($conn, "UPDATE `buku` SET `judul`='$judul', `pengarang`='$pengarang', `penerbit`='$penerbit', `genre`='$genre', `tahun_terbit`='$tanggal', `gambar`='$pp' WHERE id = '$id' ");
        if ($a) {
  ?>

          <script>
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Data anda berhasil diubah!',
              timer: 1500,
            }).then(() => {
              window.location = "halaman-buku.php";
            })
          </script>

        <?php
        }
      } else {
        echo "gagal mengubah gambar.";
      }
    } else {
      $a = mysqli_query($conn, "UPDATE `buku` SET `judul`='$judul', `pengarang`='$pengarang', `penerbit`='$penerbit', `genre`='$genre', `tahun_terbit`='$tanggal' WHERE id = '$id' ");
      if ($a) {
        ?>
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data anda berhasil diubah!',
            timer: 1500,
          }).then(() => {
            window.location = "halaman-buku.php";
          })
        </script>
  <?php
      }
    }
  }
  ?>

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
          <div class="row  justify-content-center">
            <!-- Greeting -->
            <div class="col-12" style="margin-top: -30px;">
              <h2 style="font-weight: bold;  margin-top: 80px; text-align: center; margin-top: 40px; margin-bottom: 40px;">EDIT DATA BUKU</h2>

              <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $bku["id"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $bku["gambar"]; ?>">

                <div class="input-group mb-4">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                  <input type="text" class="form-control" placeholder="Masukan Judul Buku" aria-label="judul" aria-describedby="basic-addon1" name="judul" value="<?= $bku["judul"]; ?>" required>
                </div>

                <div class="input-group mb-4">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control" placeholder="Masukan Nama Pengarang" aria-label="pengarang" aria-describedby="basic-addon1" name="pengarang" value="<?= $bku["pengarang"]; ?>" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                  <input type="text" class="form-control" placeholder="Masukan Penerbit" aria-label="penerbit" aria-describedby="basic-addon1" name="penerbit" value="<?= $bku["penerbit"]; ?>" required>
                </div>

                <label for="">Genre Buku :</label>
                <div style="margin-left: 25px;">
                  <div class="input-group mb-2">
                    <input class="form-check-input" type="checkbox" value="Romantis" name="genre" id="flexCheckDefault" value="<?= $bku["genre"]; ?>" <?= ($bku['genre'] == 'Romantis') ? 'checked' : ''; ?>>
                    <label class=" form-check-label" for="flexCheckDefault" romantis>
                      Romantis
                    </label>
                  </div>

                  <div class="input-group mb-2">
                    <input class="form-check-input" type="checkbox" value="Pendidikan" name="genre" id="flexCheckDefaultt" value="<?= $bku["genre"]; ?>" <?= ($bku['genre'] == 'Pendidikan') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexCheckDefaultt" Pendidikan>
                      Pendidikan
                    </label>
                  </div>

                  <div class="input-group mb-2">
                    <input class="form-check-input" type="checkbox" value="Misteri" name="genre" id="misteri" value="<?= $bku["genre"]; ?>" <?= ($bku['genre'] == 'Misteri') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="misteri" misteri>
                      Misteri
                    </label>
                  </div>
                </div>
                <label for="" style="font-size: 15px; color: red;">Pilih salah satu *</label>


                <div class="input-group mb-4">
                  <input type="date" class="form-control" placeholder="Masukan link Buku" aria-label="link" aria-describedby="basic-addon1" name="tahun_terbit" value="<?= date('Y-m-d', strtotime($bku['tahun_terbit'])) ?>">
                </div>

                <div class="mb-4">
                  <label for="formFile" class="form-label">Edit gambar Buku :</label>
                  <img src="img/<?= $bku["gambar"]; ?>" width="50px" style="margin-bottom: 10px;">
                  <input class="form-control" type="file" id="formFile" name="gambar">
                </div>


                <button type="submit" class="btn btn-primary" name="edit">Edit Data</button>
                <a href="halaman-buku.php" class="btn btn-danger">Kembali</a>
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