<?php

// Abheyjeet Gill
// 2025-04-21
// Description: Used to update booking status

session_start();
if (!isset($_SESSION['admin'])) exit('denied');
include 'connect.php';

$state = in_array($_GET['status'], ['pending', 'confirmed', 'declined'])
    ? $_GET['status'] : 'pending';

$stmt = $dbh->prepare("UPDATE bookings SET status=? WHERE id=?");
$stmt->execute([$state, $_GET['id']]);

header('Location: admin-dashboard.php');
