<?php
session_start();

require "functions.php";

// ambil data get di url
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (hapusPenerbit($id) > 0) {
    header("location: halaman-penerbit.php");
} else {
    echo "<script>
    alert('Data gagal dihapus!');
    document.location.href = 'halaman-penerbit.php';
</script>";
}
