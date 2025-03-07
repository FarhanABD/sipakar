<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - eNno Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Si Gizi</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#services">Informasi</a></li>

                    <!-- Conditional Button -->
                    <?php if ($this->session->userdata('email')): ?>
                    <li><a href="<?= base_url('user'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li><a href="<?= base_url('logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    <?php else: ?>
                    <li><a href="<?= base_url('auth'); ?>"><i class="fa fa-lock"></i> Login</a></li>
                    <?php endif; ?>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>


    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="fade-up">
                        <h1>Sistem Pakar Diagnosa Penyakit Gizi Buruk Pada Balita</h1>
                        <p>Deteksi dini gangguan gizi buruk anak anda</p>
                        <div class="d-flex">
                            <a href="<?= base_url('home/diagnosa'); ?>" class="btn-get-started">Mulai Diagnosa</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img style="width: 100%; height: 100%;" src="assets/img/busui_2.png" class="img-fluid animated"
                            alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity icon"></i></div>
                            <h4><a href="" class="stretched-link">Masukkan Gejala</a></h4>
                            <p>Pilih Gejala yang terlihat pada anak anda</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                            <h4><a href="" class="stretched-link">Muncul Diagnosa</a></h4>
                            <p>Sistem memunculkan diagnosa penyakit dan pencegahan</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                            <h4><a href="" class="stretched-link">Konsultasi Segera</a></h4>
                            <p>Segera konsultasikan hasil diagnosa anda dengan dokter gizi</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>About Us<br></span>
                <h2>About</h2>
                <p style="font-size: medium;">Si Gizi adalah sebuah website yang diharapkan dapat membantu orang tua
                    dalam mendeteksi gejala gizi
                    buruk pada balita </p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/about.png" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Keuntungan Aplikasi</h3>
                        <p class="fst-italic">
                            Dengan menggunakan Si Gizi pengguna akan dapat kemudahan sebagai berikut
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Diagnosa Secara Langsung</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Muncul cara pencegahan Gizi Buruk berdasarkan
                                    hasil diagnosa</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Melihat riwayat konsultasi</span></li>
                        </ul>
                        <p>
                            Kenali gejala awal gizi buruk anak anda dengan Si Gizi
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->
        <!-- Services Section -->
        <section id="services" class="services section light-background">
            <div class="container section-title" data-aos="fade-up">
                <span>Penyebab Utama Gizi Buruk</span>
                <h2>Penyebab Utama Gizi Buruk</h2>
                <p>Beberapa penyebab utama terjadinya penyakit gizi buruk</p>
            </div>

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-activity"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Asupan Makanan Tidak Seimbang</h3>
                            </a>
                            <p>Kurangnya konsumsi makanan bergizi seperti protein, vitamin, dan mineral.
                                Pola makan yang tidak mencukupi kebutuhan gizi harian.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-broadcast"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Keterbatasan Akses Pangan</h3>
                            </a>
                            <p>Kesulitan mendapatkan makanan bergizi karena faktor ekonomi.
                                Tinggal di daerah yang sulit dijangkau dengan bahan makanan bergizi.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-easel"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Infeksi dan Penyakit Kronis</h3>
                            </a>
                            <p>Penyakit seperti diare, tuberkulosis, dan infeksi kronis dapat menghambat penyerapan
                                nutrisi. Infeksi cacing yang menyebabkan tubuh kehilangan zat gizi penting.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-bounding-box-circles"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Kurangnya Edukasi tentang Gizi</h3>
                            </a>
                            <p>Minimnya pengetahuan orang tua atau masyarakat tentang pentingnya gizi seimbang.
                                Kesalahan dalam pemberian makanan pada bayi dan anak-anak.</p>
                            <a href="service-details.html" class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Sanitasi dan Kebersihan yang Buruk</h3>
                            </a>
                            <p>Lingkungan yang tidak higienis meningkatkan risiko infeksi, yang dapat mengganggu
                                penyerapan nutrisi.
                                Air minum yang terkontaminasi bisa menyebabkan penyakit yang memperburuk kondisi gizi.
                            </p>
                            <a href="service-details.html" class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-square-text"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Faktor Sosial dan Budaya</h3>
                            </a>
                            <p>Kebiasaan atau mitos yang membatasi konsumsi makanan bergizi tertentu.
                                Pembagian makanan yang tidak meratadalam keluarga.</p>
                            <a href="service-details.html" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section (Replaced with Bar Chart) -->
        <section id="services" class="services section light-background">
            <div class="container section-title" data-aos="fade-up">
                <span>Statistik</span>
                <h2>Kasus Stunting di Jember</h2>
                <p style="font-size: 24px;">Jumlah kasus stunting di setiap kecamatan di Jember berdasarkan data
                    terbaru.</p>
            </div>
            <div class="container">
                <canvas id="stuntingChart"></canvas>
            </div>
        </section>

        <!-- Tambahkan ini di bagian <head> jika belum ada -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("stuntingChart").getContext("2d");

            var labels = [];
            var data = [];

            <?php foreach ($grafik as $row) : ?>
            labels.push("<?= $row['nama_kecamatan']; ?>");
            data.push(<?= $row['jumlah']; ?>);
            <?php endforeach; ?>

            var stuntingChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Jumlah Kasus Stunting",
                        data: data,
                        backgroundColor: "rgba(39, 250, 152, 0.6)",
                        borderColor: "rgb(9, 193, 55)",
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        </script>

        <!-- Load Bootstrap and Chart.js -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section accent-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Coba Sekarang</h3>
                            <p>Mulai Diagnosa sekarang sebelum terlambat</p>
                            <a class="cta-btn" href="#">Coba</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Call To Action Section -->
    </main>
    <footer id="footer" class="footer">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">eNno</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">eNno</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
                    href=“https://themewagon.com>ThemeWagon
            </div>
        </div>
    </footer>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>