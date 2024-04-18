<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<body>
    <?php
    include 'scripts.php';
    require 'config.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];


        $userData = [
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'name' => $name,
        ];

        $collection = $database->data;

        $existingUser = $collection->findOne(['$or' => [['username' => $username], ['email' => $email]]]);

        if($existingUser){
            echo "<script>
            swal({
                title: 'Signup Failed',
                text: 'Username or email already exist!',
                timer: 2000,
                icon: 'error'
            })
        </script>";
        } else {
            $insertData = $collection->insertOne($userData);
            echo "<script>
            swal({
                title: 'Sign Up Success',
                text: 'You have successfully signed up.',
                timer: 2000,
                icon: 'success'
            }).then(() => {
                window.location.href = 'signin.php'; // Arahkan ke halaman sign-in setelah menutup pop-up
            });
            </script>";
        }

    }
    ?>


    <div class="container">
        <div class="glassmorphism-card">
            <!-- Login Section -->
            <div class="login-section">
                <h2 class="TitleHeader">Sign Up</h2>
                <form method="post">
                    <!-- name input -->
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Enter your name" />

                    <!-- username input -->
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Enter your username" />

                    <!-- email input -->
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Enter your email" />

                    <!-- Password Input -->
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter your password" />

                    <button type="submit" class="SubmitButton">Sign Up</button>
                </form>

                <div class="SignupCTA">
                    <span>Already have an account? Sign In now <a href="signin.php" class="SignUpLink"> Sign In</a></span>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>