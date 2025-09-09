<!doctype html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Galeria obrazków</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data" style="text-align:center; margin:20px;">
  <input type="file" name="image" accept="image/*" required>
  <button type="submit" name="submit">Wyślij obrazek</button>
</form>

<div class="container">
  <?php
  $conn = new mysqli("localhost", "root", "", "galeria");
  if ($conn->connect_error) {
      die("Błąd połączenia: " . $conn->connect_error);
  }

  $result = $conn->query("SELECT path FROM images ORDER BY id DESC");
  while ($row = $result->fetch_assoc()) {
      echo '<div class="element"><img src="' . htmlspecialchars($row['path']) . '" alt=""></div>';
  }
  $conn->close();
  ?>
</div>

<div id="lightbox" style="display:none;">
  <span id="closeBtn">&times;</span>
  <img id="lightbox-img">
  <div id="prevBtn">&#10094;</div>
  <div id="nextBtn">&#10095;</div>
</div>

<script src="script.js"></script>
</body>
</html>
