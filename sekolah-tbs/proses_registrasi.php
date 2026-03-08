<?php
include 'config/koneksi.php';

if (isset($_POST['daftar'])) {
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $no_hp    = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; 
    $role     = $_POST['role']; // Menangkap role (siswa, admin, atau bendahara)

    $query = "INSERT INTO users (username, password, nama_lengkap, role, no_hp) 
              VALUES ('$username', '$password', '$nama', '$role', '$no_hp')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: sukses_regis.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>