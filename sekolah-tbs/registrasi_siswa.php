<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Siswa Baru - Sekolah TBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">
<div class="login-card shadow p-4 text-center">
    <h3 class="fw-bold mb-4">DAFTAR AKUN SISWA</h3>
    <form action="proses_registrasi.php" method="POST" class="text-start">
        <input type="hidden" name="role" value="siswa">
        
        <div class="mb-3">
            <label class="small fw-bold">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
        </div>
        <div class="mb-3">
            <label class="small fw-bold">No HP</label>
            <input type="number" name="no_hp" class="form-control" placeholder="08xxxxxxxx" required>
        </div>
        <div class="mb-3">
            <label class="small fw-bold">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Buat Username" required>
        </div>
        <div class="mb-4">
            <label class="small fw-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Buat Password" required>
        </div>
        <button type="submit" name="daftar" class="btn btn-success w-100 fw-bold">Daftar Sekarang</button>
    </form>
</div>
</body>
</html>