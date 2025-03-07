<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Diagnosa</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>style_hasil_diagnosis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home'); ?>">
                <i class="fa-brands fa-windows"></i> Sistem Pakar Naive Bayes
            </a>
            <div class="ms-auto">
                <?php
                if ($this->session->userdata('email')) {
                    $log = '<i class="fa fa-power-off"></i> Logout';
                    $url = 'logout';
                } else {
                    $log = '<i class="fa fa-lock"></i> Login';
                    $url = '';
                }
                ?>
                <a href="<?= base_url('auth/' . $url); ?>" class="btn btn-light"> <?= $log; ?> </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 text-center">
        <h1 class="mb-4" style="font-weight: bold;">Hasil Diagnosis Penyakit</h1>
        <div class="alert alert-info fs-4" role="alert">
            <?php foreach ($hasilMax as $h) : ?>
            <strong><?= $h['nama_penyakit']; ?></strong>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-4">
                    <h5><b>Info Penyakit</b></h5>
                    <p><?= $h['informasi']; ?></p>
                    <h5><b>Saran</b></h5>
                    <p><?= $h['saran']; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4">
                    <h5><b>Probabilitas Penyakit</b></h5>
                    <?php foreach ($hasil as $h) : ?>
                    <div class="mb-3">
                        <strong><?= $h['nama_penyakit']; ?> (<?= floor($h['hasil_probabilitas'] * 100); ?>%)</strong>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: <?= floor($h['hasil_probabilitas'] * 100); ?>%"
                                aria-valuenow="<?= floor($h['hasil_probabilitas'] * 100); ?>" aria-valuemin="0"
                                aria-valuemax="100">
                                <?= floor($h['hasil_probabilitas'] * 100); ?>%
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container mt-4 text-center">
        <h5><b>Gambar Terkait Penyakit</b></h5>
        <img src="<?= base_url('assets/images/'); ?>gambar_penyakit.jpg" class="img-fluid rounded"
            alt="Gambar Penyakit">
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>