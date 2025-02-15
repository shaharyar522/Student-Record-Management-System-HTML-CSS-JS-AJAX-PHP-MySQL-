<?php
include('connection.php');
//(students hamray pass form main jo hidden  hian wo hian  jo kay name =sudents rahka hian )  our 
// (or insert jo hamray pass hain wo value hian hamray pass value=insert)
if (isset($_POST['students']) && $_POST['students'] == 'insert') {
    // Loop through the POST data to extract variables dynamically
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    // Correct the column names based on the actual table structure
    $query = "INSERT INTO `students` (`st_id`, `st_name`, `st_fathername`, `st_contact`, `st_email`,`st_cnic`) 
              VALUES (NULL, '" . $st_name . "', '" . $st_fathername . "', '" . $st_contact . "', '" . $st_email . "','" . $st_cnic . "');";

    // Check if the query is executed successfully

    if ($conn->query($query)) {
        // Redirect if the query runs successfully
        header('Location: /taskone/index.php');
        exit;
    } else {
        // Show error message if the query fails
        $error = "Query error: " . $conn->error;
    }
    
}
?>