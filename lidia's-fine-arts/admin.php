<?php
// Anthony Codreanu
// 2025-04-21
// Description: Main page to log in to admin
?>


<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <script src="js/theme-find.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin Login • Lidia Codreanu</title>
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
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="card" style="max-width:400px;margin-inline:auto;">
      <h2>Admin Login</h2>
      <?php $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_SPECIAL_CHARS); ?>

      <!-- Checks for login attempt to provide error message-->
      <?php if (isset($error)): ?>
        <div class="alert" style="color:red;margin-bottom:1rem;">
          <?php if ($error === 'invalid_credentials'): ?>
            Invalid username or password.
          <?php elseif ($error === 'empty_fields'): ?>
            Please fill all fields.
          <?php elseif ($error === 'invalid_request'): ?>
            Invalid request. Please try again.
          <?php else: ?>
            An error occurred. Please try again.
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <!-- Submit username and password to be authenticated-->
      <form action="admin-auth.php" method="post" class="form-grid">
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <div style="text-align:right;">
          <button>Login</button>
        </div>
      </form>
    </section>
  </main>

  <footer class="container" style="text-align:center;padding:2rem 0;">
    <p>&copy; 2025 Lidia Codreanu. All Rights Reserved.</p>
  </footer>

  <button class="theme-toggle" id="themeToggle">☾</button>
  <script src="js/admin-db.js"></script>

</body>

</html>