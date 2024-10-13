<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f0f0f0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }

        .login-container h1 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #333;
            font-size: 28px;
        }

        .form-control {
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            border-radius: 50px;
            padding: 10px 25px;
            font-size: 16px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .form-check-label {
            font-size: 14px;
            color: #555;
        }

        .forgot-password {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password:hover {
            color: #0056b3;
        }

        .social-buttons {
            display: flex;
            justify-content: space-between;
        }

        .social-buttons button {
            flex: 1;
            margin: 0 5px;
            padding: 10px 0;
            font-weight: 600;
        }

        .social-buttons button i {
            margin-right: 8px;
        }

        .text-divider {
            position: relative;
            margin: 2rem 0;
            text-align: center;
            color: #888;
        }

        .text-divider::before, .text-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #ccc;
        }

        .text-divider::before {
            left: 0;
        }

        .text-divider::after {
            right: 0;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="text-center">Welcome Back</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="backend/signin_admin.php">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-custom btn-block w-100">Login</button>
        </form>

        <p class="text-center mt-4">Don't have an account? <a href="signup.php" class="text-primary">Sign Up</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"></script>
</body>
</html>
