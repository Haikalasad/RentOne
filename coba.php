<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $database->data->findOne(['username' => $username]);

    if ($user && $password === $user['password']) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        header("Location: login.php");
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