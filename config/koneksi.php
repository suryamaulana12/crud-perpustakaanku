<?php 
// dengan urutan sbb: "nama host", "username", "password", "nama database"
$koneksi = mysqli_connect("localhost","root","","hospital");

// Cek Koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>