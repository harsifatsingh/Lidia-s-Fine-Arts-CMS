<?php

// Harsifat Singh
// 2025-04-21
// Description: Used to delete an art piece from a table

session_start();
require 'connect.php';
if (!isset($_SESSION['admin'])) {
    header('Location: admin-login.php');
    exit;
}
if (!isset($_GET['id'])) {
    header('Location: admin-dashboard.php');
    exit;
}
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

// Fetch the filename first
$stmt = $dbh->prepare("SELECT image FROM art_pieces WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if ($row) {
    $file = __DIR__ . '/uploads/' . $row['image'];
    if (is_file($file)) {
        @unlink($file);
    }
}

// Delete row from table
$stmt = $dbh->prepare("DELETE FROM art_pieces WHERE id = ?");
$stmt->execute([$_GET['id']]);

$_SESSION['flash'] = "Art piece deleted successfully!";
header('Location: admin-dashboard.php');
exit;
