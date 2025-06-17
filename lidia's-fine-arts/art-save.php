<!--
Harsifat Singh
2025-04-21
Description: Saves art piece to database
-->

<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['admin']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin.php');
    exit;
}

// Basic form inputs
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$desc = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
$image = $_FILES['image'] ?? null;

// Validate file
if (!$image || $image['error'] !== UPLOAD_ERR_OK || $title === null || $price === false || $desc === null) {
    die("Form submission error. Please check your inputs.");
}

// Generate filename
$ext = pathinfo($image['name'], PATHINFO_EXTENSION);
$filename = uniqid() . '.' . $ext;

// Move file to uploads
move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);

// Save to database
$stmt = $dbh->prepare("INSERT INTO art_pieces (title, price, description, image) VALUES (?, ?, ?, ?)");
$stmt->execute([$title, $price, $desc, $filename]);

$_SESSION['flash'] = "New art piece saved successfully!";
header('Location: admin-dashboard.php');
exit;
