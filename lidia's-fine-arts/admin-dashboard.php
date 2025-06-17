<?php

// Anthony Codreanu
// 2025-04-21
// Description: Main admin dashboard when user succesfully logs in

session_start();

if (!isset($_SESSION['admin'])) {
  header('Location: admin.php');
  exit;
}
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <script src="js/theme-find.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin Dashboard • Lidia Codreanu</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <header>
    <div class="container">
      <h1>Admin Dashboard</h1>
      <nav class="main-nav">
        <a href="index.php">View Site</a>
        <a href="logout.php">Logout</a>
      </nav>
    </div>
  </header>
  <?php if (isset($_SESSION['flash'])): ?>
    <div class="flash-msg"><?= $_SESSION['flash'] ?></div>
    <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>
  <main class="container">
    <div class="tabs">
      <button id="btnArt">Manage Art</button>
      <button id="btnBook">Bookings</button>
      <button id="btnAbout">About Text</button>
    </div>

    <!-- Manage Art -->
    <section id="art" class="panel active">
      <div class="card">
        <h2>Add New Piece</h2>
        <form action="art-save.php" method="post" enctype="multipart/form-data" class="form-grid">
          <label>Title</label><input name="title" required>
          <label>Price</label><input type="number" name="price" required min="0" step="0.01">
          <label>Description</label><textarea name="description"></textarea>
          <label>Image</label><input type="file" name="image" accept="image/*" required>
          <div class="button-row">
            <button>Save</button>
          </div>
        </form>
      </div>

      <div class="card">
        <h2>Existing Pieces</h2>
        <?php
        $stmt = $dbh->prepare("SELECT id,title,price FROM art_pieces");
        $stmt->execute();
        $pieces = $stmt->fetchAll();
        if ($pieces):
        ?>
          <table>
            <tr>
              <th>Title</th>
              <th>Price</th>
              <th colspan="2">Actions</th>
            </tr>
            <?php foreach ($pieces as $p): ?>
              <tr>
                <td><?= $p['title'] ?></td>
                <td><?= $p['price'] ?></td>
                <td>
                  <a class="btn-edit" href="art-edit.php?id=<?= $p['id'] ?>">Edit</a>
                  <a class="btn-delete" href="art-delete.php?id=<?= $p['id'] ?>"
                    onclick="return confirm('Delete?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        <?php else: ?>
          <p>No art pieces yet.</p>
        <?php endif; ?>
      </div>
    </section>

    <!-- View Bookings -->
    <section id="book" class="panel">
      <div class="card">
        <h2>Client Bookings</h2>
        <?php
        $stmt = $dbh->prepare("SELECT * FROM bookings ORDER BY meeting_date");
        $stmt->execute();
        $book = $stmt->fetchAll();
        if ($book):
        ?>
          <table>
            <tr>
              <th>Date</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Msg</th>
              <th>Status</th>
              <th>Set</th>
            </tr>
            <?php foreach ($book as $b): ?>
              <tr>
                <td><?= $b['meeting_date'] ?></td>
                <td><?= $b['full_name'] ?></td>
                <td><?= $b['email'] ?><br><?= $b['phone'] ?></td>
                <td><?= $b['message'] ?></td>
                <td><?= $b['status'] ?></td>
                <td>
                  <a href="booking-update.php?id=<?= $b['id'] ?>&status=confirmed">✔︎</a>
                  <a href="booking-update.php?id=<?= $b['id'] ?>&status=declined">✖︎</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        <?php else: ?>
          <p>No bookings yet.</p>
        <?php endif; ?>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="panel">
      <div class="card">
        <h2>Edit About Sections</h2>
        <?php
        $stmt = $dbh->prepare("SELECT * FROM about LIMIT 1");
        $stmt->execute();
        $abt = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="update_about.php" method="post" class="form-grid">
          <label>About Me</label>
          <textarea name="aboutMe" rows="3"><?= $abt['aboutMe'] ?></textarea>
          <label>My Story</label>
          <textarea name="myStory" rows="3"><?= $abt['myStory'] ?></textarea>
          <label>Artist Statement</label>
          <textarea name="artistStatement" rows="3"><?= $abt['artistStatement'] ?></textarea>
          <div class="button-row">
            <button>Update</button>
          </div>
        </form>
      </div>
    </section>
  </main>

  <footer class="container">
    <p>&copy; 2025 Lidia Codreanu. All Rights Reserved.</p>
  </footer>

  <button class="theme-toggle" id="themeToggle">☾</button>
  <script src="js/admin-db.js"></script>
</body>

</html>