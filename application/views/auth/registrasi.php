<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Pakar Metode Naive Bayes</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
    body {
        background: url('<?= base_url("assets/images/background-img.jpg"); ?>') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
        font-family: 'Roboto', sans-serif;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .register-container {
        position: relative;
        z-index: 2;
        background: rgba(74, 114, 77, 0.9);
        border-radius: 15px;
        padding: 30px;
        max-width: 450px;
        margin: auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .form-label {
        font-weight: bold;
    }

    .btn-custom {
        background-color: #28a745;
        color: #fff;
        border: none;
    }

    .btn-custom:hover {
        background-color: #218838;
    }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-container">
            <h2 class="text-center mb-4">Buat Akun Baru</h2>

            <!-- Pesan Error Validasi -->
            <?= $this->session->flashdata('message'); ?>
            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form method="POST" action="<?= base_url('auth/registrasi'); ?>">
                <!-- Username -->
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan username"
                        value="<?= set_value('name'); ?>" required>
                    <small class="text-danger"><?= form_error('name'); ?></small>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email"
                        value="<?= set_value('email'); ?>" required>
                    <small class="text-danger"><?= form_error('email'); ?></small>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password1" class="form-label">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control"
                        placeholder="Masukkan password" required>
                    <small class="text-danger"><?= form_error('password1'); ?></small>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2" class="form-control"
                        placeholder="Konfirmasi password" required>
                    <small class="text-danger"><?= form_error('password2'); ?></small>
                </div>

                <!-- Data Tambahan -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                        <input type="text" name="berat_badan" id="berat_badan" class="form-control"
                            placeholder="Masukkan berat badan" value="<?= set_value('berat_badan'); ?>">
                        <small class="text-danger"><?= form_error('berat_badan'); ?></small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                        <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control"
                            placeholder="Masukkan tinggi badan" value="<?= set_value('tinggi_badan'); ?>">
                        <small class="text-danger"><?= form_error('tinggi_badan'); ?></small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="lingkar_kepala" class="form-label">Lingkar Kepala (cm)</label>
                        <input type="text" name="lingkar_kepala" id="lingkar_kepala" class="form-control"
                            placeholder="Masukkan lingkar kepala" value="<?= set_value('lingkar_kepala'); ?>">
                        <small class="text-danger"><?= form_error('lingkar_kepala'); ?></small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lingkar_lengan_atas" class="form-label">Lingkar Lengan Atas</label>
                        <input type="text" name="lingkar_lengan_atas" id="lingkar_lengan_atas" class="form-control"
                            placeholder="Masukkan lingkar lengan atas" value="<?= set_value('lingkar_lengan_atas'); ?>">
                        <small class="text-danger"><?= form_error('lingkar_lengan_atas'); ?></small>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom btn-lg">Daftar</button>
                </div>

                <!-- Link to Login -->
                <p class="text-center mt-3">Sudah punya akun? <a href="<?= base_url('auth'); ?>"
                        class="text-primary">Login di sini</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>