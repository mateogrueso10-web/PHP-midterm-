<?php
require "connect.php";

// Get the ID from the URL
$id = $_GET['id'];

// Get the existing record
$stmt = $pdo->prepare("SELECT * FROM registrations WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

// If the form is submitted
if(isset($_POST['update'])){

    // Sanitize input
    $first_name = htmlspecialchars(trim($_POST['first_name']));// first name
    $last_name = htmlspecialchars(trim($_POST['last_name'])); // last name
    $phone = htmlspecialchars(trim($_POST['phone'])); // phone
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // email

    // Validate
    if(empty($first_name) || empty($last_name) || empty($phone) || empty($email)){
        echo "All fields are required.";
        exit();
    }
    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email.";
        exit();
    }

    // Update record
    $stmt = $pdo->prepare("UPDATE registrations 
                           SET first_name=?, last_name=?, phone=?, email=? 
                           WHERE id=?"); // Prepare update statement

    $stmt->execute([$first_name, $last_name, $phone, $email, $id]); // Execute update query

    // Redirect back to admin page
    header("Location: admin.php");
}
?>

<h2>Edit Registration</h2>

<form method="POST"> // Form to edit registration details

First Name:
<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br><br> 
<!-- Pre-fill first name with existing value -->
Last Name:
<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br><br>
<!-- Pre-fill last name with existing value -->
Phone:
<input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
<!-- Pre-fill phone with existing value -->
Email:
<input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
<!-- Pre-fill email with existing value -->
<button type="submit" name="update">Update</button>
<!-- Submit button to update the record -->
</form>