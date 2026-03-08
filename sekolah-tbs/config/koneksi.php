<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sekolah_tbs"; // Sesuaikan dengan nama database kamu

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>