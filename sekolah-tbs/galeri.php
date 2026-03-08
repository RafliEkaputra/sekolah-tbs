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
    <title>Galeri - MTS Tasywiquth Thulab TBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        :root {
            --primary-green: #2e7d32;
            --dark-green: #1a5f2e;
            --light-bg: #f8f9fa;
            --text-dark: #212529;
            --text-light: #6c757d;
        }

        body {
            background: var(--light-bg);
        }

        /* Hero Section */
        .galeri-hero {
            background: linear-gradient(135deg, var(--primary-green) 0%, #1a1a1a 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 50px;
        }

        .galeri-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .galeri-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        /* Filter Buttons */
        .filter-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: white;
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .gallery-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .gallery-category {
            font-size: 0.9rem;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Modal */
        .modal-content {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .modal-header {
            background: var(--primary-green);
            color: white;
            border: none;
            padding: 20px 25px;
        }

        .modal-body {
            padding: 0;
        }

        .modal-image {
            width: 100%;
            max-height: 70vh;
            object-fit: contain;
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 50px 0;
            margin: 50px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .stat-item {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--text-light);
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .galeri-hero h1 {
                font-size: 2rem;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 15px;
            }

            .filter-buttons {
                gap: 8px;
            }

            .filter-btn {
                padding: 8px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<section class="galeri-hero">
    <div class="container">
        <h1><i class="bi bi-images me-3"></i>Galeri Sekolah</h1>
        <p>Momen-momen berharga dan fasilitas unggulan MTS Tasywiquth Thulab TBS</p>
    </div>
</section>

<div class="container">
    <!-- Filter Buttons -->
    <div class="filter-buttons">
        <button class="filter-btn active" data-filter="all">Semua</button>
        <button class="filter-btn" data-filter="fasilitas">Fasilitas</button>
        <button class="filter-btn" data-filter="kegiatan">Kegiatan</button>
        <button class="filter-btn" data-filter="prestasi">Prestasi</button>
        <button class="filter-btn" data-filter="siswa">Kehidupan Siswa</button>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-grid">
        <!-- Fasilitas -->
        <div class="gallery-item" data-category="fasilitas">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop" alt="Gedung Sekolah">
            <div class="gallery-overlay">
                <div class="gallery-title">Gedung Utama Sekolah</div>
                <div class="gallery-category">Fasilitas</div>
            </div>
        </div>

        <div class="gallery-item" data-category="fasilitas">
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop" alt="Perpustakaan">
            <div class="gallery-overlay">
                <div class="gallery-title">Perpustakaan Modern</div>
                <div class="gallery-category">Fasilitas</div>
            </div>
        </div>

        <div class="gallery-item" data-category="fasilitas">
            <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=400&h=300&fit=crop" alt="Lab Komputer">
            <div class="gallery-overlay">
                <div class="gallery-title">Laboratorium Komputer</div>
                <div class="gallery-category">Fasilitas</div>
            </div>
        </div>

        <div class="gallery-item" data-category="fasilitas">
            <img src="https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?w=400&h=300&fit=crop" alt="Lab IPA">
            <div class="gallery-overlay">
                <div class="gallery-title">Laboratorium IPA</div>
                <div class="gallery-category">Fasilitas</div>
            </div>
        </div>

        <div class="gallery-item" data-category="fasilitas">
            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=300&fit=crop" alt="Masjid Sekolah">
            <div class="gallery-overlay">
                <div class="gallery-title">Masjid Sekolah</div>
                <div class="gallery-category">Fasilitas</div>
            </div>
        </div>

        <div class="gallery-item" data-category="fasilitas">
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop" alt="Lapangan Olahraga">
            <div class="gallery-overlay">
                <div class="gallery-title">Lapangan Olahraga</div>
                <div class="gallery-category">Fasilitas</div>
            </div>
        </div>

        <!-- Kegiatan -->
        <div class="gallery-item" data-category="kegiatan">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400&h=300&fit=crop" alt="Kegiatan Belajar">
            <div class="gallery-overlay">
                <div class="gallery-title">Kegiatan Belajar Mengajar</div>
                <div class="gallery-category">Kegiatan</div>
            </div>
        </div>

        <div class="gallery-item" data-category="kegiatan">
            <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=400&h=300&fit=crop" alt="Pramuka">
            <div class="gallery-overlay">
                <div class="gallery-title">Kegiatan Pramuka</div>
                <div class="gallery-category">Kegiatan</div>
            </div>
        </div>

        <div class="gallery-item" data-category="kegiatan">
            <img src="https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?w=400&h=300&fit=crop" alt="Sholat Berjamaah">
            <div class="gallery-overlay">
                <div class="gallery-title">Sholat Dzuhur Berjamaah</div>
                <div class="gallery-category">Kegiatan</div>
            </div>
        </div>

        <div class="gallery-item" data-category="kegiatan">
            <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?w=400&h=300&fit=crop" alt="Study Tour">
            <div class="gallery-overlay">
                <div class="gallery-title">Study Tour Edukatif</div>
                <div class="gallery-category">Kegiatan</div>
            </div>
        </div>

        <!-- Prestasi -->
        <div class="gallery-item" data-category="prestasi">
            <img src="https://images.unsplash.com/photo-1567427018141-0584cfcbf1b8?w=400&h=300&fit=crop" alt="Juara Lomba">
            <div class="gallery-overlay">
                <div class="gallery-title">Juara Lomba MTQ Tingkat Kabupaten</div>
                <div class="gallery-category">Prestasi</div>
            </div>
        </div>

        <div class="gallery-item" data-category="prestasi">
            <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=400&h=300&fit=crop" alt="Juara Olahraga">
            <div class="gallery-overlay">
                <div class="gallery-title">Tim Sepakbola Juara 3 PORPROV</div>
                <div class="gallery-category">Prestasi</div>
            </div>
        </div>

        <div class="gallery-item" data-category="prestasi">
            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=400&h=300&fit=crop" alt="Penghargaan">
            <div class="gallery-overlay">
                <div class="gallery-title">Penghargaan Sekolah Adiwiyata</div>
                <div class="gallery-category">Prestasi</div>
            </div>
        </div>

        <!-- Kehidupan Siswa -->
        <div class="gallery-item" data-category="siswa">
            <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?w=400&h=300&fit=crop" alt="Kegiatan Ekstrakurikuler">
            <div class="gallery-overlay">
                <div class="gallery-title">Kegiatan Ekstrakurikuler</div>
                <div class="gallery-category">Kehidupan Siswa</div>
            </div>
        </div>

        <div class="gallery-item" data-category="siswa">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&h=300&fit=crop" alt="Belajar Kelompok">
            <div class="gallery-overlay">
                <div class="gallery-title">Belajar Kelompok</div>
                <div class="gallery-category">Kehidupan Siswa</div>
            </div>
        </div>

        <div class="gallery-item" data-category="siswa">
            <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=400&h=300&fit=crop" alt="Moment Santai">
            <div class="gallery-overlay">
                <div class="gallery-title">Moment Santai di Taman Sekolah</div>
                <div class="gallery-category">Kehidupan Siswa</div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Siswa Aktif</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">25+</div>
                        <div class="stat-label">Guru Berkompeten</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Ruang Kelas</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label">Prestasi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="modal-image" id="modalImage">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            galleryItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Modal functionality
    const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');

    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            const title = item.querySelector('.gallery-title').textContent;
            const category = item.querySelector('.gallery-category').textContent;

            modalImage.src = img.src;
            modalImage.alt = img.alt;
            modalTitle.textContent = `${title} - ${category}`;

            modal.show();
        });
    });

    // Animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    galleryItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(item);
    });
</script>

<?php
include 'includes/footer.php';
?>
</body>
</html>
