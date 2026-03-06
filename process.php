<?php
require "connect.php";
include "header.php";

// Sanitize input
$first_name = htmlspecialchars(trim($_POST['first_name']));
$last_name = htmlspecialchars(trim($_POST['last_name']));
$phone = htmlspecialchars(trim($_POST['phone']));
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// Validate input
if(empty($first_name) || empty($last_name) || empty($phone) || empty($email)){
    echo "All fields are required.";
    exit();
}

// Validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid email format.";
    exit();
}

// Validate phone (digits only example)
if(!preg_match("/^[0-9]{10}$/", $phone)){
    echo "Phone number must be 10 digits.";
    exit();
}

// Prepared statement (secure SQL)
$stmt = $pdo->prepare("INSERT INTO registrations (first_name, last_name, phone, email) VALUES (?, ?, ?, ?)");

// Execute query
if($stmt->execute([$first_name, $last_name, $phone, $email])){
    // Redirect to admin page after successful registration
    header("Location: admin.php");
    exit();
}else{
    echo "Error saving registration.";
}

?>