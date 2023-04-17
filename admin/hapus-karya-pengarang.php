<?php
session_start();

require "functions.php";

// ambil data get di url
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (hapusKarya($id) > 0) {
    header("location: halaman-karya-pengarang.php");
} else {
    echo "<script>
    alert('Data gagal dihapus!');
    document.location.href = 'halaman-karya-pengarang.php';
</script>";
}
