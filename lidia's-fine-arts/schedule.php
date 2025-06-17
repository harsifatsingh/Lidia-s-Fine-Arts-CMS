<?php

// Abheyjeet Gill
// 2025-04-21
// Description: Allows user to schedule appointments

session_start();
?>

<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <script src="js/theme-find.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Schedule • Lidia Codreanu</title>
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
      <h2>Book a Session</h2>
      <?php if (isset($_GET['ok'])): ?>
        <p style="color:var(--accent);font-weight:600;">Thank you! Your request has been received.</p>
      <?php endif; ?>
      <form action="booking-new.php" method="post" class="form-grid">
        <div>
          <label>Date</label>
          <input type="date" name="selectedDateTime" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+1 year')) ?>" required>
        </div>
        <div>
          <label>Name</label>
          <input type="text" name="name" required>
        </div>
        <div>
          <label>Email</label>
          <input type="email" name="email" required>
        </div>
        <div>
          <label>Phone</label>
          <input type="tel" name="phone">
        </div>
        <div style="grid-column:1/-1;">
          <label>Message</label>
          <textarea name="message" rows="4"></textarea>
        </div>
        <div style="grid-column:1/-1;text-align:right;">
          <button>Confirm Booking</button>
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