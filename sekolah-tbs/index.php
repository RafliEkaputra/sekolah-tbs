<?php 
// Jika kamu butuh cek koneksi atau status pendaftaran dari database
include 'config/koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online - MTS Tasywiquth Thulab TBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <section class="hero-section text-white d-flex align-items-center" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assets/img/bg_sekolah.jpg'); background-size: cover; background-position: center; height: 80vh;">
        <div class="container text-center">
            <span class="badge bg-light text-success mb-3 px-3 py-2 fw-bold">PENDAFTARAN TAHUN AJARAN 2026/2027 DIBUKA</span>
            <h1 class="display-3 fw-bold">Selamat Datang di Portal PMB <br> MTS Tasywiquth Thulab TBS</h1>
            <p class="lead mb-5">Wujudkan pendidikan berkualitas dan berkarakter bersama kami.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="registrasi_siswa.php" class="btn btn-light btn-lg px-5 py-3 fw-bold shadow text-success">
                    <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang
                </a>
                <a href="login.php" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login Akun
                </a>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow-sm rounded-4">
                        <i class="bi bi-person-check text-success fs-1"></i>
                        <h4 class="fw-bold mt-3">Akreditasi B</h4>
                        <p class="text-muted small">Menjamin kualitas pendidikan dengan standar nasional terbaik.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow-sm rounded-4">
                        <i class="bi bi-journal-text text-success fs-1"></i>
                        <h4 class="fw-bold mt-3">Kurikulum Terpadu</h4>
                        <p class="text-muted small">Perpaduan ilmu agama dan pengetahuan umum yang seimbang.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow-sm rounded-4">
                        <i class="bi bi-building-check text-success fs-1"></i>
                        <h4 class="fw-bold mt-3">Fasilitas Modern</h4>
                        <p class="text-muted small">Gedung, Lab, dan Perpustakaan lengkap untuk kenyamanan siswa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-8">
                    <h3 class="fw-bold">Butuh Bantuan Pendaftaran?</h3>
                    <p class="mb-0 opacity-75">Tim Panitia PMB kami siap membantu Anda setiap hari kerja pukul 08.00 - 15.00 WIB.</p>
                </div>
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <a href="https://wa.me/628123456789" class="btn btn-success btn-lg px-4 fw-bold">
                        <i class="bi bi-whatsapp me-2"></i> WhatsApp Panitia
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>