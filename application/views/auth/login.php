<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
    body {
        background: url('assets/images/background-img.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Roboto', sans-serif;
        color: #fff;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .login-container {
        position: relative;
        z-index: 2;
        background: rgba(74, 114, 77, 0.9);
        border-radius: 15px;
        padding: 30px;
        max-width: 450px;
        width: 600px;
        margin: auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        font-size: 16px;
        padding: 10px 15px;
    }

    .btn-custom {
        background-color: #28a745;
        color: #fff;
        border: none;
    }

    .btn-custom:hover {
        background-color: #218838;
    }

    .forgot-password-link {
        color: #007bff;
    }

    .forgot-password-link:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-container">
            <h2 class="text-center mb-4">Login</h2>

            <!-- Flash Message -->
            <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?= base_url('auth'); ?>">
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"
                        value="<?= set_value('email'); ?>" required>
                    <small class="text-danger"><?= form_error('email'); ?></small>
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter your password" required>
                    <small class="text-danger"><?= form_error('password'); ?></small>
                </div>
                <!-- Remember Me and Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#!" class="forgot-password-link">Forgot password?</a>
                </div>
                <!-- Login Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom btn-lg">Login</button>
                </div>
                <!-- Link to Register -->
                <p class="text-center mt-3">Don't have an account? <a href="<?= base_url('auth/registrasi'); ?>"
                        class="link-danger">Register here</a></p>
            </form>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>