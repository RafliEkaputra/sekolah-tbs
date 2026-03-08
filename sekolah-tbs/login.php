<?php
session_start();
include 'config/koneksi.php';

// Cek jika sudah login, langsung lempar ke dashboard
if (isset($_SESSION['role'])) {
    header("Location: " . $_SESSION['role'] . "/index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; 

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['nama'] = $data['nama_lengkap'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['id_user'] = $data['id'];

        header("Location: " . $data['role'] . "/index.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sekolah TBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">

<div class="login-card shadow">
    <div class="text-center mb-4">
        <img src="assets/img/logo_profil.jpg" alt="Logo" width="80" class="mb-3">
        <h3 class="fw-bold">LOGIN SISTEM PPDB</h3>
        <p class="text-muted small">MTS Tasywiquth Thulab TBS Tangerang</p>
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger small p-2"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label small fw-bold">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username Anda" required>
        </div>
        <div class="mb-4">
            <label class="form-label small fw-bold">Password</label>
            <input type="password" name="password" id="passInput" class="form-control" placeholder="Password Anda" required>
        </div>

        <button type="submit" name="login" class="btn btn-success w-100 p-2 fw-bold shadow-sm">Masuk ke Dashboard</button>
        
        <div class="text-center mt-4">
            <p class="small text-muted mb-1">Belum punya akun siswa?</p>
            <a href="registrasi_siswa.php" class="text-success fw-bold" style="text-decoration:none;">
                <i class="bi bi-person-plus-fill"></i> Daftar Siswa Baru di Sini
            </a>
        </div>

        <hr class="my-4">
        
        <div class="text-center">
            <a href="index.php" class="text-muted small" style="text-decoration:none;">
                <i class="bi bi-house-door"></i> Kembali ke Beranda
            </a>
        </div>
    </form>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>