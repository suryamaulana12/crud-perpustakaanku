<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "hummasoft_crud");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambahBuku($data)
{
    global $conn;


    // menangkap data
    $judul = htmlspecialchars($data["judul"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $genre = $data["genre"];
    $tanggal = date('d/m/Y', strtotime($data["tahun_terbit"]));

    //    upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    // query data
    $query = "INSERT INTO buku VALUES ('', '$judul', '$pengarang', '$penerbit', '$genre', '$tanggal','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{


    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukan ekstensi gambar');
        </script>";
        return false;
    }

    // cek ukuran gambar apakah terlalu besar
    if ($ukuranFile > 100000) {
        echo "<script>
            alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // untuk membedakan namafile    
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapusBuku($id)
{
    global $conn;

    $id = $_GET["id"];

    $sql = $conn->query("SELECT * FROM buku WHERE id = '$id'");

    $data = $sql->fetch_assoc();

    $gambar = $data["gambar"];

    if (file_exists("img/$gambar")) {
        unlink("img/$gambar");
    }

    mysqli_query($conn, "DELETE FROM buku WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function editBuku($data)
{
    global $conn;

    // menangkap data dari tabel
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $genre = htmlspecialchars($data["genre"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $gambarLama = $data["gambarLama"];


    $id = $_GET["id"];

    $sql = $conn->query("SELECT * FROM buku WHERE id = '$id'");

    $data = $sql->fetch_assoc();

    $gambar = $data["gambar"];

    if (file_exists("img/$gambar")) {
        unlink("img/$gambar");
    }


    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query data
    $query = " UPDATE buku SET 
        judul = '$judul',
        pengarang = '$pengarang',
        penerbit = '$penerbit',
        genre = '$genre',
        tahun_terbit = '$tahun_terbit',
        gambar = '$gambar'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cariBuku($search)
{
    // like digunakan untuk mencari data walaupun data yang dimasukan tidak lengkap seutuhnya
    $query = "SELECT * FROM buku WHERE
            judul LIKE '%$search%' OR
            pengarang LIKE '%$search%' OR
            penerbit LIKE '%$search%' OR
            genre LIKE '$search'
    ";
    return query($query);
}

function tambahAnggota($data)
{
    global $conn;

    // menangkap data
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $usia = htmlspecialchars($data["usia"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // query data
    $query = "INSERT INTO anggota VALUES ('', '$nama', '$jenis_kelamin', '$usia', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusAnggota($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM anggota WHERE id = $id ");

    return mysqli_affected_rows($conn);
}


function editAnggota($data)
{
    global $conn;

    // menangkap data dari tabel
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $usia = htmlspecialchars($data["usia"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // query data
    $query = " UPDATE anggota SET 
        nama = '$nama',
        jenis_kelamin = '$jenis_kelamin',
        usia = '$usia',
        alamat = '$alamat'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cariAnggota($search)
{
    global $conn;
    // like digunakan untuk mencari data walaupun data yang dimasukan tidak lengkap seutuhnya
    $query = "SELECT * FROM anggota WHERE
            nama LIKE '%$search%' OR
            jenis_kelamin LIKE '%$search%' OR
            usia LIKE '%$search%' OR
            alamat LIKE '$search'
    ";
    return query($query);
}

function tambahKarya($data)
{
    global $conn;

    // menangkap data
    $nama = htmlspecialchars($data["nama"]);
    $karya_pengarang = htmlspecialchars($data["karya_pengarang"]);

    // query data
    $query = "INSERT INTO karya_pengarang VALUES ('', '$nama', '$karya_pengarang')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editKarya($data)
{
    global $conn;

    // menangkap data dari tabel
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $karya_pengarang = htmlspecialchars($data["karya_pengarang"]);

    // query data
    $query = " UPDATE karya_pengarang SET 
        nama = '$nama',
        karya_pengarang = '$karya_pengarang'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusKarya($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM karya_pengarang WHERE id = $id ");

    return mysqli_affected_rows($conn);
}


function tambahPengarang($data)
{
    global $conn;

    // menangkap data
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $karya_populer = htmlspecialchars($data["karya_populer"]);

    // query data
    $query = "INSERT INTO pengarang VALUES ('', '$nama', '$jenis_kelamin', '$alamat', '$karya_populer')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusPengarang($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pengarang WHERE id = $id ");

    return mysqli_affected_rows($conn);
}


function editPengarang($data)
{
    global $conn;

    // menangkap data dari tabel
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $karya_populer = htmlspecialchars($data["karya_populer"]);

    // query data
    $query = " UPDATE pengarang SET 
        nama = '$nama',
        jenis_kelamin = '$jenis_kelamin',
        alamat = '$alamat',
        karya_populer = '$karya_populer'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cariPengarang($search2)
{
    // like digunakan untuk mencari data walaupun data yang dimasukan tidak lengkap seutuhnya
    $query = "SELECT * FROM pengarang WHERE
            nama LIKE '%$search2%' OR
            jenis_kelamin LIKE '%$search2%' OR
            alamat LIKE '%$search2%' OR
            karya_populer LIKE '$search2'
    ";
    return query($query);
}

function tambahPenerbit($data)
{
    global $conn;

    // menangkap data
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $terbitan_populer = htmlspecialchars($data["terbitan_populer"]);
    $no_telp = htmlspecialchars($data["no_telp"]);

    // cek nomor ada yang sama gak didatabase
    $result = mysqli_query($conn, "SELECT no_telp FROM penerbit WHERE no_telp = '$no_telp'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert( 'Nomor sudah terdaftar, coba cari nomor yang berbeda!' );
        </script>";
        return false;
    }

    // query data
    $query = "INSERT INTO penerbit VALUES ('', '$nama', '$alamat', '$terbitan_populer', '$no_telp')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapusPenerbit($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM penerbit WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function editPenerbit($data)
{
    global $conn;

    // menangkap data dari tabel
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $terbitan_populer = htmlspecialchars($data["terbitan_populer"]);
    $no_telp = htmlspecialchars($data["no_telp"]);

    // query data
    $query = " UPDATE penerbit SET 
        nama = '$nama',
        alamat = '$alamat',
        terbitan_populer = '$terbitan_populer',
        no_telp = '$no_telp'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cariPenerbit($search)
{
    // like digunakan untuk mencari data walaupun data yang dimasukan tidak lengkap seutuhnya
    $query = "SELECT * FROM penerbit WHERE
            nama LIKE '%$search%' OR
            alamat LIKE '%$search%' OR
            terbitan_populer LIKE '%$search%' OR
            no_telp LIKE '$search'
    ";
    return query($query);
}

function tambahPetugas($data)
{
    global $conn;

    // menangkap data
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telp = htmlspecialchars($data["no_telp"]);

    // cek nama username ada yang sama gak didalam database
    $result = mysqli_query($conn, "SELECT nama FROM petugas WHERE nama = '$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar, coba cari yang lain!');
        </script>";
        return false;
    }


    // cek nomor ada yang sama gak didatabase
    $result = mysqli_query($conn, "SELECT no_telp FROM petugas WHERE no_telp = '$no_telp'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert( 'Nomor sudah terdaftar, coba cari nomor yang berbeda!' );
        </script>";
        return false;
    }

    // query data
    $query = "INSERT INTO petugas VALUES ('', '$nama', '$jenis_kelamin', '$alamat', '$no_telp')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusPetugas($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM petugas WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function editPetugas($data)
{
    global $conn;

    // menangkap data dari tabel
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telp = htmlspecialchars($data["no_telp"]);


    // query data
    $query = " UPDATE petugas SET 
        nama = '$nama',
        jenis_kelamin = '$jenis_kelamin',
        alamat = '$alamat',
        no_telp = '$no_telp'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cariPetugas($search)
{
    // like digunakan untuk mencari data walaupun data yang dimasukan tidak lengkap seutuhnya
    $query = "SELECT * FROM petugas WHERE
            nama LIKE '%$search%' OR
            jenis_kelamin LIKE '%$search%' OR
            alamat LIKE '%$search%' OR
            no_telp LIKE '$search'
    ";
    return query($query);
}

function register($data)
{
    global $conn;

    // menangkap data dari inputan register
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);

    // cek nama username ada yang sama gak didalam database
    $result = mysqli_query($conn, "SELECT username FROM register WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar, coba cari yang lain!');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $konfirmasi_password) {
        echo "<script>
            alert('Konfirmasi passwrod tidak sesuai');
        </script>";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan user baru kedatabase 
    mysqli_query($conn, "INSERT INTO register VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
