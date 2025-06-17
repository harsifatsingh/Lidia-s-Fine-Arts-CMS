<?php

// Harsifat Singh
// 2025-04-21
// Description: Database connection for Lidia Codreanu's website

try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=singh84_db",
        "singh84_local",
        "xxxxx" //use your server password here
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
