<?php

// Anthony Codreanu
// 2025-04-21
// Description: Checks login information

session_start();
include 'connect.php';

// Validate input
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($username) || empty($password)) {
    header('Location: admin.php?error=empty_fields');
    exit;
}

// Get user from database
$stmt = $dbh->prepare("SELECT id, username, pw_hash FROM admin_users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verify credentials
if ($user && password_verify($password, $user['pw_hash'])) {
    $_SESSION['admin'] = $user['username'];
    $_SESSION['admin_id'] = $user['id'];
    $_SESSION['last_activity'] = time();
    header('Location: admin-dashboard.php');
    exit;
} else {
    header('Location: admin.php?error=invalid_credentials');
    exit;
}
