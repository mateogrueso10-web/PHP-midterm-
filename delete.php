<?php
require "connect.php";

// Get the ID from the URL
$id = $_GET['id'];

// Prepare delete statement
$stmt = $pdo->prepare("DELETE FROM registrations WHERE id = ?");

// Execute the query
$stmt->execute([$id]);

// Redirect back to admin page
header("Location: admin.php");
exit();
?>