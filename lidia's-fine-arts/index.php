<?php

// Richard Owino
// 2025-04-21
// Description: Home Page of entire website

session_start();
include 'connect.php';

$stmt = $dbh->prepare("SELECT * FROM about");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <script src="js/theme-find.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>About • Lidia Codreanu</title>
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
      <h2>About Me</h2>
      <p><?= htmlspecialchars($row['aboutMe']) ?></p>
    </section>

    <section class="bio-grid">
      <div class="card">
        <h3>My Story</h3>
        <p><?= htmlspecialchars($row['myStory']) ?></p>
      </div>
      <div class="bio-image-container">
        <img class="bio-img light-img" src="images/about_light.png" alt="Artist Portrait Light">
        <img class="bio-img dark-img" src="images/about_dark.png" alt="Artist Portrait Dark">
      </div>
    </section>

    <section class="card">
      <h3>Artist Statement</h3>
      <p><?= htmlspecialchars($row['artistStatement']) ?></p>
    </section>

    <section class="reviews-marquee card">
      <h2>Kind Words From Collectors</h2>

      <div class="reviews-marquee-container" id="review-container">
        <div class="track" id="review-track">
          <div class="review">
            <p class="quote">"Lidia captured the light exactly the way I remember our vineyard at dusk."</p>
            <span class="author">— Elena R.</span>
          </div>
          <div class="review">
            <p class="quote">"Her commission for our foyer has become the centerpiece of our home."</p>
            <span class="author">— Marcus & Lea</span>
          </div>
          <div class="review">
            <p class="quote">"The texture and depth are even more breathtaking in person."</p>
            <span class="author">— D. Chen</span>
          </div>
          <div class="review">
            <p class="quote">"Five stars. Communication, process, final piece—everything was flawless."</p>
            <span class="author">— Alyssa P.</span>
          </div>
          <div class="review">
            <p class="quote">"It feels alive on our wall. We've already commissioned a second work!"</p>
            <span class="author">— The Whitman Studio</span>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="container" style="text-align:center;padding:2rem 0;">
    <p>&copy; 2025 Lidia Codreanu. All Rights Reserved.</p>
  </footer>

  <button class="theme-toggle" id="themeToggle">☾</button>
  <script src="js/flip-theme.js"></script>
  <script src="js/index.js"></script>


</body>

</html>