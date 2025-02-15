<?php
include('incs/connection.php');
if (isset($_POST['students']) && $_POST['students'] == 'insert') {
    // Loop through the POST data to extract variables dynamically
    foreach ($_POST as $key => $value){
        $$key = $value;
    }
    // Correct the column names based on the actual table structure
    $last_id = 0;
    if ($update_student > 0) {
        $last_id = $update_student;
        $query = "UPDATE `students` 
        SET 
            `st_name` = '" . $st_name . "', 
            `st_fathername` = '" . $st_fathername . "', 
            `st_contact` = '" . $st_contact . "', 
            `st_email` = '" . $st_email . "', 
            `st_cnic` = '" . $st_cnic . "' 
        WHERE `st_id` = '" . $update_student . "';";
    } else {
        $query = "INSERT INTO `students` (`st_name`, `st_fathername`, `st_contact`, `st_email`, `st_cnic`) 
          VALUES ('$st_name', '$st_fathername', '$st_contact', '$st_email', '$st_cnic');";
    }
    // Check if the query is executed successfully
    if ($conn->query($query)) {
        // Redirect if the query runs successfully
        if($last_id == 0) $last_id = $conn->insert_id;
        $output = array('result' => 'success', 'student_id' => $last_id);
        echo json_encode($output);
        exit;
    } else {
        $output = array('result' => 'failed', 'message' => 'insertion failed');
        echo json_encode($output);
        exit;
    }
}
//now this is delete code 
else if (isset($_POST['students']) && $_POST['students'] == 'delete') {
    $st_id = intval($_POST['st_id']); // Sanitize ID to prevent any misuse

    // Prepare the SQL query to delete the record
    $delete_query = "DELETE FROM students WHERE st_id = ?";
    $stmt = $conn->prepare($delete_query);

    if ($stmt) {
        // Bind the student ID parameter and execute the query
        $stmt->bind_param('i', $st_id);
        if ($stmt->execute()) {
            // If deletion is successful, redirect with a success message
            echo "deleted";
            exit();
        } else {
            // If query execution failed, redirect with an error message
            echo "failed";
            exit();
        }
    } else {
        // If query preparation failed, redirect with an error message
        echo "failed-2";
        exit();
    }
}
//uay hamrary  pass update wala code hain
else if (isset($_POST['students']) && $_POST['students'] == 'fetch') {
    $st_id = intval($_POST['st_id']); // Sanitize ID to prevent any misuse

    // Prepare the SQL query to delete the record
    $fetch_query = "SELECT * FROM students WHERE st_id ='" . $st_id . "'  ";
    $res = $conn->query($fetch_query)->fetch_assoc();
    echo json_encode($res);
} else {
    // If no valid student ID is provided, redirect with an error message
    echo  "failed-3";
    exit();
}
///thi is editing the code
// For fetching student data when clicking on the edit button
