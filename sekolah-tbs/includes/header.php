<?php
// Memulai session jika belum dimulai di file utama
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top" style="background: linear-gradient(135deg, #1a1a1a 0%, #2e7d32 100%);">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
            <img src="assets/img/logo_profil.jpg" alt="Logo" width="40" class="me-2">
            <div class="lh-1">
                <span class="fs-5 d-block">MTS TBS</span>
                <small style="font-size: 0.7rem; font-weight: normal;">Tasywiquth Thulab</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
            </ul>
            
            <div class="d-flex gap-2">
                <?php if(isset($_SESSION['role'])): ?>
                    <a href="<?php echo $_SESSION['role']; ?>/index.php" class="btn btn-warning fw-bold px-4">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a href="logout.php" class="btn btn-outline-light px-3">Keluar</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-light px-4">Login</a>
                    <a href="registrasi_siswa.php" class="btn btn-light text-success fw-bold px-4">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>