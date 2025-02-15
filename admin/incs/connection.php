<?php 
// Database configuration
$servername = "localhost"; // Database server (usually localhost)
$username = "root";        // Database username
$password = "";            // Database password (empty by default for XAMPP)
$dbname = "taskone";          // Name of the database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// You can now use this connection to perform queries on the 'students' table

?>
