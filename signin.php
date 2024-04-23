<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Sign In</title>
</head>

<body>
<?php
session_start();
include 'scripts.php';
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $database->data->findOne(['username' => $username]);

    if ($user && $password === $user['password']) {
        $_SESSION['username'] = $username;
        echo "<script>
                swal({
                    title: 'Login Berhasil!',
                    text: 'You have successfully signed in.',
                    timer: 1500,
                    icon: 'success'
                }).then(() => {
                    // Redirect to admin.php if the username is 'admin'
                    if ('$username' === 'admin') {
                        window.location.href = 'admin/admin.php';
                    } else {
                        window.location.href = 'dashboard.php';
                    }
                });
            </script>";
    } else {
        echo "<script>
        swal({
            title: 'Login Gagal',
            text: 'Username or password not found.',
            timer: 1500,
            icon: 'error'
        })
    </script>";
    }
}
?>




<div class="container">
    <div class="glassmorphism-card">
        <!-- Login Section -->
        <div class="login-section">
            <h2 class="TitleHeader">Welcome Back!</h2>
            <form method="post">
                <!-- Username Input -->
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Enter your username" />

                <!-- Password Input -->
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter your password" />

                <button type="submit" class="SubmitButton">Sign In</button>
            </form>

            <div class="SignupCTA">
                <span>Don’t have an account? Create now  <a href="signup.php" class="SignUpLink"> Sign up</a> </span>
               
            </div>
        </div>
    </div>
</div>


</body>
</html>
