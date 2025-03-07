<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="font-weight: bold;">Sistem Pakar Metode Naive Bayes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <style>
    .banner-section {
        position: relative;
        background-image: url('<?= base_url("assets/images/background-img.jpg"); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        z-index: 1;
    }

    .banner-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        z-index: -1;
    }

    .hover-effect {
        position: relative;
        overflow: hidden;
        transition: color 0.3s ease;
    }

    .hover-effect::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: white;
        transition: all 0.3s ease;
    }

    .hover-effect:hover {
        color: #ffd700 !important;
    }

    .hover-effect:hover::after {
        width: 100%;
        left: 0;
    }

    .navbar .btn:hover {
        background-color: #ffffff !important;
        color: #0056b3 !important;
    }
    </style>

</head>

<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="<?= base_url('home'); ?>">
                <i class="fa fa-lightbulb me-2"></i> Sistem Pakar Naive Bayes
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php
                    if ($this->session->userdata('email')) {
                        $log = '<i class="fa fa-power-off"></i> Logout';
                        $url = 'logout';
                        $link = base_url('user');
                        $menu = '<li class="nav-item"><a class="nav-link text-white me-3 hover-effect" href="' . $link . '"><i class="fa fa-home"></i> Dashboard</a></li>';
                    } else {
                        $log = '<i class="fa fa-lock"></i> Login';
                        $url = 'login';
                        $menu = '';
                    }
                    ?>
                    <?= $menu; ?>
                    <li class="nav-item">
                        <a class="btn btn-light text-primary fw-semibold hover-effect"
                            href="<?= base_url("auth/" . $url); ?>"><?= $log; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner Section -->
    <div class="banner-section text-white py-5">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Sistem Pakar Diagnosa Penyakit Gizi Buruk Pada Balita</h1>
                    <a href="<?= base_url('home/diagnosa'); ?>" class="btn btn-light text-primary mt-4">
                        <i class="fa fa-play"></i> Mulai Diagnosa
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="<?= base_url('assets/images/'); ?>bayi.png" class="img-fluid" alt="Banner Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="text-primary">Info</h2>
                    <p class="mt-4" style="max-width: 800px;">
                        Sistem Pakar ini membantu Anda mendiagnosa penyakit gizi buruk pada balita secara dini.
                        Dengan menggunakan metode Naïve Bayes, kami memberikan hasil analisis yang cepat dan akurat
                        untuk membantu Anda mengambil tindakan yang tepat.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?= base_url('assets/images'); ?>/balita-dan-gizi.jpg" alt="Info Gambar"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="text-primary">About Us</h2>
            <p class="mt-4 mx-auto" style="max-width: 800px;">
                Kami adalah tim yang berdedikasi untuk meningkatkan kesadaran akan kesehatan balita melalui teknologi.
                Sistem ini dirancang untuk memudahkan para orang tua, dokter, dan tenaga kesehatan dalam
                menganalisis risiko gizi buruk dengan akurat dan efisien.
            </p>
            <div class="row mt-5">
                <div class="col-md-4">
                    <i class="fa fa-user-circle fa-4x text-success mb-3"></i>
                    <h5>John Doe</h5>
                    <p>Ahli Gizi dan Kesehatan Anak</p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-user-circle fa-4x text-success mb-3"></i>
                    <h5>Jane Smith</h5>
                    <p>Developer Sistem Pakar</p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-user-circle fa-4x text-success mb-3"></i>
                    <h5>Mark Wilson</h5>
                    <p>Data Scientist</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">© 2025 Sistem Pakar Naive Bayes. All Rights Reserved.</p>
            <p class="mb-0">Follow us:
                <a href="#" class="text-white mx-1"><i class="fa fa-facebook"></i></a>
                <a href="#" class="text-white mx-1"><i class="fa fa-twitter"></i></a>
                <a href="#" class="text-white mx-1"><i class="fa fa-instagram"></i></a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>