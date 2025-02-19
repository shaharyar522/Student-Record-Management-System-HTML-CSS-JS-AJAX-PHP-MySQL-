<?php include('incs/dbconnect.php');
$showalert = false;
$showError = false;
$nameExit = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];
    $cpassword = $_POST['user_cpassword'];
    $ceheckquery = "SELECT * FROM `signup_user_data` WHERE  `user_name` = '$username'";
    $checkresult = mysqli_query($conn, $ceheckquery);
    $row = mysqli_num_rows($checkresult);

    if ($row > 0) {
        $nameExit = true;
        echo "name_exists";
        exit();
    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `signup_user_data` ( `user_name`, `user_password`, `dt`) VALUES ( '$username', '$hash', '2025-01-29 13:30:36.000000');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showalert = true;
                echo "showalert";
                exit();
            }
        }
        //ar password equal na hun to then uay error shwo karo 
        else {
            $showError = true;
            echo "password_mismatch";
            exit();
        }
    }
}
?>
<html>
<head>
    <title>Creative Colorlib SignUp Form</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/nav.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>


<body>
    <?php include('incs/navbar.php') ?>

    <!-- main -->
    <!-- uay hamray pass jab data enter karya ga to wo hamaay show karay ga 
     alert ki form -->

    <div class="main-w3layouts wrapper">
        <h1 style="color:white;">Creative SignUp Form</h1>
        <div class="main-agileinfo">
            <!-- -->
            <div class="agileits-top">
                <form action="javascript:;" method="POST">
                    <input class="text  w3lpass" type="text" name="user_name" placeholder="Username" required="">
                    <input class="text  w3lpass" type="password" name="user_password" placeholder="Password" required="">
                    <input class="text w3lpass" type="password" name="user_cpassword" placeholder="Confirm Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required="">
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="sign_up()">SIGNUP</button>
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
    <!-- now this is the bootsratap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function sign_up() {
            var usersignup_name = $('input[name="user_name"]').val();
            var usersignup_password = $('input[name="user_password"]').val();
            var usersignup_cpassword = $('input[name="user_cpassword"]').val();
            $.ajax({
                url: "process.php",
                type: "POST",
                data: "user_name=" + usersignup_name + "&user_password=" + usersignup_password + "&user_cpassword=" + usersignup_cpassword + "&REQUEST_METHOD=POST",
                success: function(response) {
                    response = response.trim();
                    if (response === "name_exists") {
                        alert("Error! Username already exists, please choose a different name.");
                    } else if (response === "showalert") {
                        alert("Your account has been created. You can now login.");
                        window.location.href = "login.php"; // Redirect to login page after success
                    } else if (response === "password_mismatch") {
                        alert("Error! Passwords do not match. Please try again.");
                    }
                },
                error: function() {
                    alert("Error!");
                },
            });
        }
    </script>
</body>

</html>