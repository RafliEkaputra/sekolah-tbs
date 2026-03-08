<?php
session_start();
include 'config/koneksi.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - TBS School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #f59e0b;
            --light-bg: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            background: #faf8f6;
            min-height: 100vh;
        }

        /* Header Section */
        .contact-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
        }

        .contact-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .contact-header p {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 0;
        }

        /* Main Container */
        .contact-container {
            max-width: 1200px;
            margin: -40px auto 50px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        /* Info Cards */
        .info-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
            border-left: 5px solid #10b981;
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .info-card-icon {
            font-size: 2.5rem;
            color: #10b981;
            margin-bottom: 15px;
        }

        .info-card h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--text-dark);
            font-weight: 600;
        }

        .info-card p {
            color: var(--text-light);
            font-size: 0.95rem;
            margin: 0;
            line-height: 1.6;
        }

        /* Form Section */
        .form-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .form-section h2 {
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: var(--text-dark);
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }

        .form-section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Button */
        .submit-btn {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            padding: 14px 40px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.3);
            display: inline-block;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Success Message */
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 2px solid #6ee7b7;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 25px;
        }

        /* Error Message */
        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border: 2px solid #fca5a5;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 25px;
        }

        /* Map Section */
        .map-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .map-section h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--text-dark);
            font-weight: 700;
        }

        .map-container {
            border-radius: 10px;
            overflow: hidden;
            height: 400px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .info-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .info-cards {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .contact-header {
                padding: 40px 20px;
            }

            .contact-header h1 {
                font-size: 1.8rem;
            }

            .form-section {
                padding: 25px;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .info-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .info-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .info-card:nth-child(3) {
            animation-delay: 0.2s;
        }
    </style>
</head>
<body>

<div class="contact-header">
    <h1><i class="fas fa-envelope"></i> Hubungi Kami</h1>
    <p>Kami siap membantu menjawab pertanyaan Anda. Silakan hubungi kami kapan saja</p>
</div>

<div class="contact-container">
    <!-- Info Cards -->
    <div class="info-cards">
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Alamat</h3>
            <p>Jl. Pendidikan No. 123<br>Kota, Provinsi 12345<br>Indonesia</p>
        </div>

        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h3>Telepon</h3>
            <p>(021) 1234-5678<br>(021) 8765-4321<br>Call Center 24/7</p>
        </div>

        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3>Email</h3>
            <p>info@tbs-school.com<br>support@tbs-school.com<br>admin@tbs-school.com</p>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="form-section">
        <h2>Kirim Pesan Kami</h2>

        <?php
        $success = false;
        $error = false;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = htmlspecialchars($_POST['nama'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $subjek = htmlspecialchars($_POST['subjek'] ?? '');
            $pesan = htmlspecialchars($_POST['pesan'] ?? '');

            if (!empty($nama) && !empty($email) && !empty($subjek) && !empty($pesan)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // Proses pengiriman email atau simpan ke database
                    $success = true;
                } else {
                    $error = "Email tidak valid!";
                }
            } else {
                $error = "Semua field harus diisi!";
            }
        }

        if ($success) {
            echo '<div class="alert-success">
                    <i class="fas fa-check-circle"></i> Pesan Anda telah terkirim. Kami akan menghubungi Anda segera!
                  </div>';
        }

        if ($error) {
            echo '<div class="alert-danger">
                    <i class="fas fa-exclamation-circle"></i> ' . $error . '
                  </div>';
        }
        ?>

        <form method="POST" action="" class="contact-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
            </div>

            <div class="form-group">
                <label for="subjek">Subjek *</label>
                <input type="text" id="subjek" name="subjek" placeholder="Masukkan subjek pesan Anda" required>
            </div>

            <div class="form-group">
                <label for="pesan">Pesan *</label>
                <textarea id="pesan" name="pesan" placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i> Kirim Pesan
            </button>
        </form>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <h2>Lokasi Kami</h2>
        <div class="map-container">
            <!-- Embed Google Map atau custom map di sini -->
            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="400" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Form validation
    const form = document.querySelector('.contact-form');
    const inputs = form.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.style.borderColor = '#fca5a5';
            } else {
                this.style.borderColor = '#e2e8f0';
            }
        });
    });

    // Reset form after successful submission
    form.addEventListener('submit', function() {
        if (<?php echo $success ? 'true' : 'false'; ?>) {
            setTimeout(() => {
                form.reset();
            }, 1000);
        }
    });
</script>

<?php
include 'includes/footer.php';
?>
</body>
</html>
