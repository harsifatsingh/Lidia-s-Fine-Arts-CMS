<?php

// Abheyjeet Gill
// 2025-04-21
// Description: Inserts information into table

include 'connect.php';

// Validate inputs
$date = trim(filter_input(INPUT_POST, 'selectedDateTime', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

// Basic validation
if (empty($date) || empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: schedule.php?error=validation');
  exit;
}

// Validate date format (YYYY-MM-DD)
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
  header('Location: schedule.php?error=invalid_date');
  exit;
}

// Insert into database
try {
  $stmt = $dbh->prepare(
    "INSERT INTO bookings (meeting_date, full_name, email, phone, message, status) 
        VALUES (?, ?, ?, ?, ?, 'pending')"
  );
  $stmt->execute([$date, $name, $email, $phone ?: null, $message ?: null]);
  header('Location: schedule.php?ok=1');
} catch (PDOException $e) {
  error_log("Booking error: {$e->getMessage()}");
  header('Location: schedule.php?error=system');
}
