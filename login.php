<?php
include('incs/dbconnect.php');
session_start(); // Start session for user login tracking

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = $_POST['user_password'];

    // SQL query to get the user data
    $sql = "SELECT * FROM signup_user_data WHERE user_name = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['user_password'])) {
            // Password is correct, start session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id']; // Store user ID for security

            header("Location: admin"); // Redirect to admin page
            exit();
        } else {
            echo "invalid_credentials"; // Incorrect password
        }
    } else {
        echo "invalid_credentials"; // User not found
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/signup.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('incs/navbar.php') ?>

    <div class="main-w3layouts wrapper">
        <h1 style="color:white;">Admin Login</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <!-- Login form -->
                <form action="login.php" method="POST">
                    <input class="text w3lpass" type="text" name="user_name" placeholder="Username" required="">
                    <input class="text w3lpass" type="password" name="user_password" placeholder="Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required="">
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
