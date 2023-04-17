<?php
session_start();

require 'functions.php';

// ambil data get di url
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (hapusBuku($id) > 0) {
  header("location: halaman-buku.php");
} else {
  echo "<script>
      alert('Data gagal dihapus!');
      document.location.href = 'halaman-buku.php';
  </script>";
}
