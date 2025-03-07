<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    body {
        font-family: sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('assets/images/background-img.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-color: rgba(0, 0, 0, 0.7);
        /* Black with 70% opacity */
    }

    .container {
        background-color: #fff;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .error {
        color: red;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .success {
        color: green;
        font-size: 12px;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1>Login</h1>

        <?php if ($this->session->flashdata('message')): ?>
        <p class="success"><?php echo $this->session->flashdata('message'); ?></p>
        <?php endif; ?>

        <form method="POST" action="<?= base_url('auth'); ?>">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter your email"
                value="<?= set_value('email'); ?>">
            <?php if (form_error('email')): ?>
            <p class="error"><?= form_error('email'); ?></p>
            <?php endif; ?>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <?php if (form_error('password')): ?>
            <p class="error"><?= form_error('password'); ?></p>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="<?= base_url('auth/registrasi'); ?>">Register now</a></p>
    </div>

</body>

</html>