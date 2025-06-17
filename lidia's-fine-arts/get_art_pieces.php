<?php
// Harsifat Singh
// 2025-04-21
// Description: Fetches art pieces from the database

header('Content-Type: application/json');
include 'connect.php';

// Base URL for uploads folder
$baseURL = 'uploads';

// Determine sorting order
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
if ($sort === 'price_asc') {
    $orderBy = 'ORDER BY price ASC';
} elseif ($sort === 'price_desc') {
    $orderBy = 'ORDER BY price DESC';
} else {
    // Default: newest first
    $orderBy = 'ORDER BY id DESC';
}

// Fetch art pieces
$sql  = "SELECT id, title, price, description, image FROM art_pieces $orderBy";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$artPieces = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $artPieces[] = [
        'title'       => $row['title'],
        'price'       => '$' . $row['price'],
        'description' => $row['description'],
        'image'       => $baseURL . '/' . $row['image']
    ];
}

echo json_encode($artPieces);