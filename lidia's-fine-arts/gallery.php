<?php

// Harsifat Singh
// 2025-04-21
// Description:
//     Gallery page for Lidia Codreanu's website
//     This page displays a grid of art pieces with sorting options. 
//     It also includes a lightbox feature for viewing images in detail. 
//     The page is responsive and supports dark mode.

session_start();
?>

<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <script src="js/theme-find.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Gallery • Lidia Codreanu</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <header>
    <div class="container">
      <h1>Lidia Codreanu</h1>
      <p>Visual Artist | Painter | Dreamer</p>
      <nav class="main-nav">
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="schedule.php">Schedule</a>
        <?php if (isset($_SESSION['admin'])): ?>
          <a href="admin-dashboard.php">Admin</a>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="admin.php">Login</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="card">
      <div class="heading-with-sort">
        <h2>Gallery</h2>
        <button id="sortButton" class="sort-button" title="Change sorting order">
          <span class="sort-icon">↓</span>
          <span class="sort-label">Newest</span>
        </button>
      </div>
      <p>Explore my latest artworks, available for purchase.</p>
    </section>

    <!-- Gallery Grid -->
    <div id="gallery" class="gallery"></div>
  </main>

  <footer class="container">
    <p>&copy; 2025 Lidia Codreanu. All Rights Reserved.</p>
  </footer>

  <button class="theme-toggle" id="themeToggle">☾</button>
  <script src="js/gallery.js"></script>
  <script src="js/flip-theme.js"></script>
</body>

</html>