<?php

// Anthony Codreanu
// 2025-04-21
// Description: Logs user out of admin status

session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
