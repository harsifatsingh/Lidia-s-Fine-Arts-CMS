<?php

// Harsifat Singh
// 2025-04-21
// Description: Used to edit art piece data

session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: admin.php');
  exit;
}
include 'connect.php';

//Received updated artpiece information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate inputs
  $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
  $price = trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS));
  $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));

  if (!$id || empty($title) || empty($price)) {
    header('Location: admin-dashboard.php?error=invalid_input');
    exit;
  } else {
    header('Location: admin-dashboard.php');
  }
  $stmt = $dbh->prepare("UPDATE art_pieces SET title = ?, price = ?, description = ? WHERE id = ?");
  $stmt->execute([$title, $price, $description, $id]);
}

// Validate input ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
  header('Location: admin-dashboard.php?error=invalid_id');
  exit;
}

// Get art piece data
try {
  $stmt = $dbh->prepare("SELECT * FROM art_pieces WHERE id = ?");
  $stmt->execute([$id]);
  $p = $stmt->fetch();

  if (!$p) {
    header('Location: admin-dashboard.php?error=not_found');
    exit;
  }
} catch (PDOException $e) {
  error_log("Art fetch error: {$e->getMessage()}");
  header('Location: admin-dashboard.php?error=fetch_failed');
  exit;
}


?>
<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <script src="js/theme-find.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Edit Art • Lidia Codreanu</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <header>
    <div class="container">
      <h1>Edit "<?= $p['title'] ?>"</h1>
      <nav class="main-nav">
        <a href="admin-dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="card" style="max-width:500px;margin-inline:auto;">
      <form method="post" class="form-grid">
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        <label>Title</label>
        <input name="title" value="<?= $p['title'] ?>" required>
        <label>Price</label>
        <input type="number" name="price" value="<?= $p['price'] ?>" required min="0" step="0.01" required>
        <label>Description</label>
        <textarea name="description" rows="3"><?= $p['description'] ?></textarea>
        <div style="grid-column:1/-1;text-align:right;">
          <button>Save</button>
        </div>
      </form>
    </section>
  </main>

  <footer class="container" style="text-align:center;padding:2rem 0;">
    <p>&copy; 2025 Lidia Codreanu. All Rights Reserved.</p>
  </footer>

  <button class="theme-toggle" id="themeToggle">☾</button>
  <script src="js/flip-theme.js"></script>
</body>

</html>