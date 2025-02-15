<?php
// Include the database connection file
// Adjust this path if necessary
include('connection.php');

// Check if 'st_id' is provided and is a valid number
if (isset($_GET['st_id']) && is_numeric($_GET['st_id'])) {
    $st_id = intval($_GET['st_id']); // Sanitize ID to prevent any misuse

    // Prepare the SQL query to delete the record
    $delete_query = "DELETE FROM students WHERE st_id = ?";
    $stmt = $conn->prepare($delete_query);

    if ($stmt) {
        // Bind the student ID parameter and execute the query
        $stmt->bind_param('i', $st_id);

        if ($stmt->execute()) {
            // If deletion is successful, redirect with a success message
            header("Location: /taskone/index.php?message=Record successfully deleted");
            exit();
        } else {
            // If query execution failed, redirect with an error message
            header("Location: /taskone/index.php?error=Failed to execute delete query");
            exit();
        }
    } else {
        // If query preparation failed, redirect with an error message
        header("Location: /taskone/index.php?error=Failed to prepare delete query");
        exit();
    }
} else {
    // If no valid student ID is provided, redirect with an error message
    header("Location: /taskone/index.php?error=Invalid or missing student ID");
    exit();
}
?>
