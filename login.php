<?php include('incs/dbconnect.php');

$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];
    // $sql = "SELECT * FROM  signup_user_data WHERE user_name= '$username' AND user_password= '$password'";
    $sql = "SELECT * FROM  signup_user_data WHERE user_name= '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['user_password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['usernmae'] = $username;
                header("location:admin");
            } else {
                $showError = "Invalied Credentional ";
            }
        }
    } else {
        $showError =  "Invalied Credentional ";
    }
}
?>
<html>

<head>
    <title>Creative Colorlib SignUp Form</title>
  <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/signup.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<bod>
    <?php require_once('incs/navbar.php') ?>
    
    <!-- uay hamray pass jab data enter karya ga to wo hamaay show karay ga 
     alert ki form -->

    <!-- uay hamray pass jab data enter karya ga to password agar same nhi hian to tu error show karay ga -->

    <div class="main-w3layouts wrapper">
        <h1 style="color:white;">Creative a Login Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="login.php" method="POST">
                    <input class="text  w3lpass" type="text" name="user_name" placeholder="Username" required="">
                    <input class="text  w3lpass" type="password" name="user_password" placeholder="Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required="">
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick=" log_in()">Login</button>
                </form>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2024 Signup Form. All rights reserved | Design by SHAHAR YAR</a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- <script>
        function log_in() {
            var userLogin_name = $('input[name="user_name"]').val();
            var userLogin_password = $('input[name="user_password"]').val();
            $.ajax({
                url: "process.php",
                type: "POST",
                data: {
                    user_name: userLogin_name,
                    user_password: userLogin_password
                },
                success: function(response) {
                    response = response.trim();
                    if (response === "success") {
                        window.location.href = "admin"; // Redirect to admin page
                    } else if (response === "invalid_password") {
                        alert("Incorrect password. Please try again.");
                    } else if (response === "user_not_found") {
                        alert("User not found. Please check your username.");
                    }
                },
                error: function() {
                    alert("AJAX request failed. Please try again.");
                }
            });
        }
    </script> -->

   



    </script>
    <!-- now this is the bootsratap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>