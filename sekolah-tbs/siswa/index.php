<?php
session_start();
include '../config/koneksi.php';

// Proteksi Halaman: Hanya boleh dimasuki oleh role 'siswa'
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../login.php");
    exit;
}

// Ambil ID User dari session untuk mencari data pendaftar
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id_user = '$id_user'");
$data = mysqli_fetch_assoc($query);

// Logika status pendaftaran (default jika belum isi data)
$status = $data['status_pendaftaran'] ?? 'Belum Melengkapi Data';
$warna_status = 'secondary';

if($status == 'Pending') { $warna_status = 'warning'; }
elseif($status == 'Diterima') { $warna_status = 'success'; }
elseif($status == 'Ditolak') { $warna_status = 'danger'; }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa - MTS TBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">DASHBOARD SISWA</a>
            <div class="d-flex align-items-center gap-3 text-white">
                <span class="small d-none d-md-inline">Halo, <?php echo $_SESSION['nama']; ?></span>
                <a href="../logout.php" class="btn btn-outline-light btn-sm">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row g-4">
            
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h2 class="fw-bold">Selamat Datang, <?php echo $_SESSION['nama']; ?>! 👋</h2>
                    <p class="text-muted">Selamat bergabung di portal pendaftaran MTS Tasywiquth Thulab TBS. Silakan lengkapi biodata Anda untuk melanjutkan proses seleksi.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold mb-4">Langkah Pendaftaran Anda:</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">1</div>
                        <div>
                            <p class="mb-0 fw-bold">Buat Akun</p>
                            <small class="text-success"><i class="bi bi-check-circle"></i> Selesai</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-<?php echo ($data ? 'success' : 'secondary'); ?> text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">2</div>
                        <div>
                            <p class="mb-0 fw-bold">Lengkapi Biodata & Upload Berkas</p>
                            <small class="text-muted">Status: <?php echo ($data ? 'Sudah Diisi' : 'Belum Diisi'); ?></small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">3</div>
                        <div>
                            <p class="mb-0 fw-bold">Verifikasi Panitia & Pengumuman</p>
                            <small class="text-muted">Menunggu proses tahap 2</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center mb-4">
                    <h6 class="text-muted small fw-bold text-uppercase">Status Pendaftaran</h6>
                    <div class="badge bg-<?php echo $warna_status; ?> py-2 px-3 fs-6 my-3">
                        <?php echo $status; ?>
                    </div>
                    <hr>
                    <?php if(!$data): ?>
                        <p class="small text-muted">Anda belum mengisi formulir pendaftaran.</p>
                        <a href="lengkap_biodata.php" class="btn btn-success w-100 fw-bold">
                            <i class="bi bi-pencil-square me-2"></i> Isi Formulir Sekarang
                        </a>
                    <?php else: ?>
                        <p class="small text-muted">Data Anda sedang diperiksa oleh panitia.</p>
                        <a href="lihat_profil.php" class="btn btn-outline-success w-100 fw-bold">
                            <i class="bi bi-person-bounding-box me-2"></i> Lihat Data Saya
                        </a>
                    <?php endif; ?>
                </div>

                <div class="card border-0 bg-dark text-white rounded-4 p-4">
                    <h6 class="fw-bold"><i class="bi bi-headset me-2"></i>Butuh Bantuan?</h6>
                    <p class="small opacity-75">Jika mengalami kesulitan, silakan hubungi admin di nomor WhatsApp berikut:</p>
                    <a href="#" class="btn btn-light btn-sm w-100 fw-bold text-dark">Chat Admin</a>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>