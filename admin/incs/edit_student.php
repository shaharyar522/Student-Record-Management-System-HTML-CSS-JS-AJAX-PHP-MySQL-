<!-- this is navbar q.k us main image ki patah ko acces nahi kar sakta tah agar just php main call karatain tu 
  -->


  <section id="nav-br">
    <nav>
        <div class="navbar-container">
            <!-- Logo Section -->
            <img src="../image/navbar_logo.png" alt="Logo" class="logo-img">
    
                <div class="logo-text">Student Record Website</div>
           

            <!-- Navigation Links -->
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#reservations">Reservations</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <!-- Menu Toggle for Mobile -->
            <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        </div>
    </nav>
</section>




<?php
// Include database connection
include('connection.php');

// Initialize variables
$error = "";
$success = "";
$st_name = $st_fathername = $st_contact = $st_email = $st_cnic = "";

// Check if a student ID is passed via GET
if (isset($_GET['st_id']) && !empty($_GET['st_id'])) {
    $st_id = intval($_GET['st_id']); // Convert to integer for safety

    // Fetch the student record based on the ID
    $query = "SELECT * FROM students WHERE st_id = $st_id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $student = $result->fetch_object();
        $st_name = $student->st_name;
        $st_fathername = $student->st_fathername;
        $st_contact = $student->st_contact;
        $st_email = $student->st_email;
        $st_cnic = $student->st_cnic;
    } else {
        $error = "Student record not found!";
    }
}

// Handle form submission for updating student record
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_student'])) {
    $st_id = intval($_POST['st_id']); // Get the ID from the form
    $st_name = $_POST['st_name'];
    $st_fathername = $_POST['st_fathername'];
    $st_contact = $_POST['st_contact'];
    $st_email = $_POST['st_email'];
    $st_cnic = $_POST['st_cnic'];

    // Update the student record
    $update_query = "UPDATE students 
                     SET st_name = '$st_name', st_fathername = '$st_fathername', st_contact = '$st_contact', st_email = '$st_email', st_cnic = '$st_cnic' 
                     WHERE st_id = $st_id";

    if ($conn->query($update_query)) {
        $success = "Student record updated successfully!";
        header('Location: /taskone/index.php');// Redirect back to the main form
        exit();
    } else {
        $error = "Error updating record: " . $conn->error;
    }
}
?>

<head>
    
    <link rel="stylesheet" href="../css/edit_studens.css">
    <link rel="stylesheet" href="../css/nav.css">
    <title>update  Student record</title>
    
            

</head>
<body>
    <h2>UPDATE STUDENT RECORD</h2>

    <?php if ($error): ?>
        <p style="color: red;"><?= $error; ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p style="color: green;"><?= $success; ?></p>
    <?php endif; ?>

    <?php if (!empty($st_name)): ?>
        <form action="edit_student.php"  id="editModal" method="POST">
            <input type="hidden" name="st_id" value="<?= $st_id; ?>">

            <label for="st_name">Name</label>
            <input type="text" name="st_name" id="st_name"  pattern="[A-Za-z\s]+" title="Only letters (A-Z, a-z) are allowed" placeholder="Enter Your Name" value="<?= htmlspecialchars($st_name); ?>" required><br><br>

            <label for="st_fathername">Father's Name</label>
            <input type="text" name="st_fathername" id="st_fathername" pattern="[A-Za-z\s]+" title="Only letters (A-Z, a-z) are allowed" placeholder=" Enter Your Father Name" value="<?= htmlspecialchars($st_fathername); ?>" required><br><br>

            <label for="st_contact">Contact</label>
            <input type="text" name="st_contact" id="st_contact" name="st_contact" pattern="92-\d{3}-\d{7}" title="Format: 92-300-1234567" placeholder="92-34**-*******" required oninput="formatPhoneNumber(this) value="<?= htmlspecialchars($st_contact); ?>" required><br><br>

            <label for="st_email">Email</label>
            <input type="email" name="st_email" id="st_email"  placeholder="Abc@gmail.com" value="<?= htmlspecialchars($st_email); ?>" required><br><br>

            <label for="st_cnic">CNIC</label>
            <input type="text" name="st_cnic" id="st_cnic" placeholder="XXXXX-XXXXXXX-X" required maxlength="15" oninput="formatCNIC(this) value="<?= htmlspecialchars($st_cnic); ?>" required><br><br>

            <button type="submit" name="update_student">Update</button>
            <button type="reset"name="reset_student">Reset</button>
        </form>
        

        
    <?php else: ?>
        <p>No student selected for editing.</p>
    <?php endif; ?>
    
          
    <script src="../js/form.js"></script>
</body>
</html>
