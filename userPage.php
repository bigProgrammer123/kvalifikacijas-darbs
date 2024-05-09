<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <header>
    <h1>Book Search</h1>
  </header>
  <div class="container">
    <div class="container">
      <?php include 'filters.php'; ?>
      <script src="filter.js"></script>

      <form action="" method="POST">
      <input id="search" name="search" type="text" placeholder="Search...">
      <input id="submit" name="submit" type="submit" value="Search">
      </form>
    </div>

    <div class="books">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "ils";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM book";

      if(isset($_GET['language']) && !empty($_GET['language'])) {
        $language = $_GET['language'];
        if($language !== 'all') {
          $sql .= " WHERE language = '$language'";
        }
      }
      if(isset($_GET['author']) && !empty($_GET['author'])) {
        $author = $_GET['author'];
        if($author !== 'all') {
          $sql .= " WHERE author = '$author'";
        }
      }
      if(isset($_GET['genre']) && !empty($_GET['genre'])) {
        $author = $_GET['genre'];
        if($author !== 'all') {
          $sql .= " WHERE genre = '$author'";
        }
      }

      if (isset($_POST["submit"])) {
        $str = $_POST["search"];
        $sql = "SELECT * FROM book WHERE title LIKE '%$str%' OR author LIKE '%$str%'";
        $result = $conn->query($sql);
      
      }
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class='book'>";
          echo "<img class='book-cover' src='" . $row["cover_img"] . "' alt='book-cover'>";
          echo "<h2>" . $row["title"] . "</h2>";
          echo "<p>" . $row["author"] . "</p>";
          echo "<button class='view-details-btn' data-language='" . $row["language"] . "' data-description='" . $row["description"] . "'>View Details</button>";
          echo "</div>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </div>
<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <img id="modalImg" class="modal-img" src="" alt="book-cover">
    <h2 id="modalTitle"></h2>
    <p id="modalAuthor"></p>
    <p id="modalLanguage"></p>
    <p id="modalDescription"></p>
    <button id="orderButton" type="button" onclick="toggleForm()">Order</button>
    <form  action="order.php" method="POST" id="orderForm" style="display: none;">
    <strong>Your full name:</strong>
      <input type="text" name="name" placeholder="Name" required><br>
      <strong>Your e-mail:</strong>
      <input type="email" name="email" placeholder="Email" required><br>
      <strong>Your phone number:</strong>
      <input type="tel" name="phone_num" placeholder="Phone Number" required>
      <button type="submit">Submit Order</button>
    </form>
  </div>
</div>
<script src="userWindow.js"></script>

  </div>
  <div class="login-form">
    <h2>Login</h2>
    <?php
      session_start();

      $login_error = "";

      if (isset($_SESSION['login_error'])) {
          $login_error = $_SESSION['login_error'];
          unset($_SESSION['login_error']);
      }
      if (!empty($login_error)): ?>
                  <p><?php echo $login_error; ?></p>
      <?php endif; 
    ?>
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>
      <button type="submit">Login</button>
    </form>
  </div>
  <br>
  
<?php include 'contactForm.php'; ?>
  </div>
</body>
</html>