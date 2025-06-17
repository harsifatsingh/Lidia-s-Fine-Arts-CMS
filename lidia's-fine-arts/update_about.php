<?php

// Abheyjeet Gill
// 2025-04-21
// Description: Used to update the about me section of the website

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin.php');
    exit;
}

include 'connect.php';

// Validate inputs
$aboutMe = trim($_POST['aboutMe'] ?? '');
$myStory = trim($_POST['myStory'] ?? '');
$artistStatement = trim($_POST['artistStatement'] ?? '');

// Update database
$stmt = $dbh->prepare("UPDATE about SET aboutMe = ?, myStory = ?, artistStatement = ?");
$stmt->execute([$aboutMe, $myStory, $artistStatement]);
header('Location: admin-dashboard.php?updated=about');
