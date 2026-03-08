<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah - MTS Tasywiquth Thulab TBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <?php include 'includes/header.php'; ?>

    <section class="py-5 text-white" style="background: linear-gradient(rgba(46, 125, 50, 0.9), rgba(46, 125, 50, 0.9)), url('assets/img/bg-sekolah.jpg'); background-size: cover; background-position: center;">
        <div class="container text-center py-4">
            <h1 class="display-4 fw-bold">Profil Sekolah</h1>
            <p class="lead">Mengenal lebih dekat MTS Tasywiquth Thulab TBS Tangerang</p>
        </div>
    </section>

    <main class="flex-shrink-0 my-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <h2 class="fw-bold text-success mb-4"><i class="bi bi-info-circle me-2"></i>Sejarah Singkat</h2>
                    <p class="text-muted" style="line-height: 1.8;">
                        MTS Tasywiquth Thulab TBS Tangerang didirikan dengan semangat untuk mencetak generasi yang tidak hanya unggul secara intelektual, tetapi juga memiliki kedalaman akhlak. Berawal dari keinginan luhur para pendiri untuk menyediakan akses pendidikan Islam yang berkualitas di wilayah Tangerang, sekolah ini terus berkembang menjadi institusi pendidikan yang terpercaya.
                    </p>
                    <p class="text-muted" style="line-height: 1.8;">
                        Hingga saat ini, kami terus berinovasi dalam kurikulum dan fasilitas untuk menjawab tantangan zaman tanpa meninggalkan nilai-nilai tradisi keislaman yang menjadi ciri khas kami.
                    </p>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="assets/img/logo_profil.jpg" class="card-img-top p-5 bg-white" alt="Logo Sekolah" style="object-fit: contain; height: 300px;">
                    </div>
                </div>
            </div>

            <hr class="my-5 opacity-25">

            <div class="row g-4">
                <div class="col-md-5">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4">
                        <div class="card-body">
                            <div class="icon-box mb-3 d-inline-block p-3 bg-success bg-opacity-10 rounded-circle text-success">
                                <i class="bi bi-eye-fill fs-1"></i>
                            </div>
                            <h3 class="fw-bold mb-3">VISI</h3>
                            <p class="fst-italic text-muted">
                                "Terwujudnya generasi yang bertaqwa, berakhlaqul karimah, cerdas, terampil, dan unggul dalam prestasi akademik maupun non-akademik."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-box me-3 p-2 bg-success bg-opacity-10 rounded-circle text-success">
                                    <i class="bi bi-list-check fs-2"></i>
                                </div>
                                <h3 class="fw-bold m-0">MISI</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0 d-flex align-items-start bg-transparent">
                                    <i class="bi bi-check2-circle text-success me-3 fs-5"></i>
                                    <span>Menyelenggarakan pendidikan berbasis nilai-nilai keislaman yang kaffah.</span>
                                </li>
                                <li class="list-group-item border-0 px-0 d-flex align-items-start bg-transparent">
                                    <i class="bi bi-check2-circle text-success me-3 fs-5"></i>
                                    <span>Mengembangkan kurikulum yang integratif antara ilmu umum dan ilmu agama.</span>
                                </li>
                                <li class="list-group-item border-0 px-0 d-flex align-items-start bg-transparent">
                                    <i class="bi bi-check2-circle text-success me-3 fs-5"></i>
                                    <span>Meningkatkan profesionalisme tenaga pendidik secara berkelanjutan.</span>
                                </li>
                                <li class="list-group-item border-0 px-0 d-flex align-items-start bg-transparent">
                                    <i class="bi bi-check2-circle text-success me-3 fs-5"></i>
                                    <span>Menyediakan sarana dan prasarana pendidikan yang modern dan representatif.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>