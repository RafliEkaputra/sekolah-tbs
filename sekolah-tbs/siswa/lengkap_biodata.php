<?php
session_start();
include '../config/koneksi.php';

// Proteksi: Hanya siswa yang boleh masuk
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// Cek apakah siswa sudah pernah isi data
$cek = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id_user = '$id_user'");
if (mysqli_num_rows($cek) > 0) {
    // Jika sudah ada data, arahkan ke halaman lihat profil agar tidak dobel input
    header("Location: index.php"); 
    exit;
}

// Logika Simpan Data
if (isset($_POST['simpan'])) {
    $nik            = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama_siswa     = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $jk             = $_POST['jenis_kelamin'];
    $tempat_lahir   = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
    $tgl_lahir      = $_POST['tanggal_lahir'];
    $alamat         = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $nama_ayah      = mysqli_real_escape_string($koneksi, $_POST['nama_ayah']);
    $nama_ibu       = mysqli_real_escape_string($koneksi, $_POST['nama_ibu']);
    $asal_sekolah   = mysqli_real_escape_string($koneksi, $_POST['asal_sekolah']);

    $query = "INSERT INTO pendaftar (id_user, nik, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, nama_ayah, nama_ibu, asal_sekolah, status_pendaftaran, status_pembayaran) 
              VALUES ('$id_user', '$nik', '$nama_siswa', '$jk', '$tempat_lahir', '$tgl_lahir', '$alamat', '$nama_ayah', '$nama_ibu', '$asal_sekolah', 'Pending', 'Belum Bayar')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lengkapi Biodata - Sekolah TBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-arrow-left me-2"></i> FORMULIR BIODATA</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form action="" method="POST" class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white p-4 border-0">
                        <h4 class="fw-bold text-success mb-0">Lengkapi Data Calon Siswa</h4>
                        <p class="text-muted small">Pastikan semua data diisi dengan benar sesuai kartu keluarga.</p>
                    </div>
                    
                    <div class="card-body p-4 bg-white">
                        <h6 class="text-uppercase fw-bold text-secondary mb-3" style="letter-spacing: 1px;">1. Informasi Pribadi</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">NIK (Sesuai KK)</label>
                                <input type="number" name="nik" class="form-control" required placeholder="16 Digit NIK">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nama Lengkap Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $_SESSION['nama']; ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required placeholder="Contoh: Tangerang">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3" required placeholder="Nama jalan, RT/RW, Kecamatan, Kota"></textarea>
                            </div>
                        </div>

                        <h6 class="text-uppercase fw-bold text-secondary mb-3" style="letter-spacing: 1px;">2. Data Orang Tua</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nama Ayah Kandung</label>
                                <input type="text" name="nama_ayah" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nama Ibu Kandung</label>
                                <input type="text" name="nama_ibu" class="form-control" required>
                            </div>
                        </div>

                        <h6 class="text-uppercase fw-bold text-secondary mb-3" style="letter-spacing: 1px;">3. Pendidikan Sebelumnya</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label class="form-label small fw-bold">Asal Sekolah (SD/MI)</label>
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="Contoh: SD Negeri 1 Tangerang" required>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light p-4 border-0 d-flex justify-content-between">
                        <a href="index.php" class="btn btn-outline-secondary px-4 fw-bold">Batal</a>
                        <button type="submit" name="simpan" class="btn btn-success px-5 fw-bold shadow-sm">
                            <i class="bi bi-send-fill me-2"></i> Kirim Formulir
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>