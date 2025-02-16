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
