<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <style>

  </style>
</head>

<body>


  <!-- Sidebar -->
  <ul class="navbar-nav sidebar bg-gradient-primary sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
      <div class="sidebar-brand-icon">
        <i class="fas fa-book"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="dashboard.php">
        <i class="fas fa-home"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Fitur Utama
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>Halaman</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Daftar Halaman:</h6>
          <a class="collapse-item mb-1" href="halaman-anggota.php"><i class="fas fa-user mr-2"></i>Data Anggota</a>
          <a class="collapse-item mb-1" href="halaman-buku.php"><i class="fas fa-book mr-2"></i>Data Buku</a>
          <div class="dropend">
            <a class="collapse-item mb-1 dropdown-toggle text-decoration-none" href="halaman-pengarang.php" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom: 10px"><i class="fas fa-users me-1"></i>Data Pengarang</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="halaman-pengarang.php">Data Pengarang</a></li>
              <li><a class="dropdown-item" href="halaman-karya-pengarang.php">Karya Pengarang</a></li>
            </ul>
          </div>
          <a class="collapse-item mb-1" href="halaman-penerbit.php"><i class="fas fa-landmark mr-2"></i>Data Penerbit</a>
          <a class="collapse-item mb-1" href="halaman-petugas.php"><i class="fas fa-users mr-2"></i>Data Petugas</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-file-alt"></i>
        <span>Post</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manajemen Post:</h6>
          <a class="collapse-item" href="post-list.php"><i class="fas fa-list mr-2"></i>List Post</a>
          <a class="collapse-item" href="post-tambah.php"><i class="fas fa-plus mr-2"></i>Tambah Post</a>
          <a class="collapse-item" href="kategori-list.php"><i class="fas fa-bars mr-2"></i>Kategori</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Tables -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <li class="nav-item">
      <a class="nav-link" href="logout.php" onclick="return confirm('yakin mau keluar?');">
        <i class="fas fa-arrow-right"></i>
        <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
</body>

</html>