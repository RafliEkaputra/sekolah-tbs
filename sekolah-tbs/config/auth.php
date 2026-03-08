<?php
session_start();

function cek_akses($role_wajib) {
    if (!isset($_SESSION['role'])) {
        echo "<script>alert('Silakan login terlebih dahulu!'); window.location='../login.php';</script>";
        exit;
    }

    if ($_SESSION['role'] !== $role_wajib) {
        echo "<script>alert('Anda tidak memiliki akses ke halaman ini!'); window.location='../login.php';</script>";
        exit;
    }
}
?>