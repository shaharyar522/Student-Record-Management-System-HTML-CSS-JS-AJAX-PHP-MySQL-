<?php
include('./admin/incs/connection.php');
session_start(); // Make sure session is started for user login tracking

$showError = false; // For showing error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];

    // SQL query to find the user by username and password
    $sql = "SELECT * FROM admin_login WHERE user_name = '$username' AND user_password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // If a user is found, start the session and redirect to admin page
    if ($num == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: admin.php"); // Redirect to admin page
        exit;
    } else {
        $showError = "Invalid Credentials"; // Show error message if login fails
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

                <!-- Display error message if login fails -->
                <?php
                if ($showError) {
                    echo '<div style="color: red; text-align: center;">' . $showError . '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
