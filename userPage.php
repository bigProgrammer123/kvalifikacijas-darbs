<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body id="bodyUser">
  <header>
    <h1>Book Search</h1>
  </header>
  <div class="container">
    <div class="container">
      <?php include 'filters.php'; ?>
      <script src="filter.js"></script>

      <form action="" method="POST" class="search-bar">
      <input class="search-input" id="search" name="search" type="text" placeholder="Search...">
      <input class="search-btn" id="submit" name="submit" type="submit" value="Search">
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

      session_start();

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
      if(isset($_GET['udk']) && !empty($_GET['udk'])) {
        $udk = $_GET['udk'];
        if($udk !== 'all') {
          $sql .= " WHERE udk = '$udk'";
        }
      }
      if(isset($_GET['price']) && !empty($_GET['price'])) {
        $price = $_GET['price'];
        if($price !== 'all') {
          $sql .= " WHERE price = '$price'";
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
          echo "<img class='book-cover' src='Images/" . $row["cover_img"] . "' alt='book-cover'>";
          echo "<h2>" . $row["title"] . "</h2>";
          echo "<p>" . $row["author"] . "</p>";
          echo "<button class='view-details-btn' data-book-id='" . $row["book_id"] . "' data-language='" . $row["language"] . "' data-description='" . $row["description"] . "' data-type='" . $row["type"] . "' data-udk='" . $row["udk"] . "' data-link='" . $row["link_to_literature"] . "' data-price='" . $row["price"] . "' data-date='" . $row["publish_date"] . "'>View Details</button>";
          echo "</div>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </div>

  </div>
  <div class="login-form">
    <h2>Login</h2>
    <?php

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
      <label class="label" for="username">Username:</label>
      <input class="input" type="text" id="username" name="username" required><br>
      <label class="label" for="password">Password:</label>
      <input class="input" type="password" id="password" name="password" required><br>
      <button class="login-btn" type="submit">Login</button>
    </form>
  </div>
  
    <?php include 'contactForm.php'; ?>
  </div>
      <!-- Modal -->
      <div id="myModal" class="detailModal">
        <div class="detail-modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <img id="modalImg" class="detail-modal-img" src="" alt="book-cover">
          <h2 id="modalTitle"></h2>
          <strong>By:</strong>
          <p style="display: inline-block" id="modalAuthor"></p>&ensp;&ensp;&ensp;
          <strong>Language</strong>
          <p style="display: inline-block" id="modalLanguage"></p><br>
          <strong>Description</strong>
          <p style="display: inline-block; width: 50%" id="modalDescription"></p><br>
          <strong>Type of literature:</strong>
          <p style="display: inline-block" id="modalType"></p>&ensp;&ensp;
          <strong>Udk</strong>
          <p style="display: inline-block" id="modalUdk"></p>&ensp;&ensp;
          <strong>Price:</strong>
          <p style="display: inline-block" id="modalPrice"></p><br>
          <strong>Link to an external source:</strong>
          <p style="display: inline-block" id="modalLink"></p><br>
          <strong>Publishing year:</strong>
          <p style="display: inline-block" id="modalDate"></p><br>
          <button class="login-btn" id="orderButton" type="button" onclick="toggleForm()">Order</button>
          <form class="modal-form" action="order.php" method="POST" id="orderForm" style="display: none;">
            <strong>Your full name:</strong>
            <input type="text" name="name" placeholder="Name" required><br>
            <strong>Your e-mail:</strong>
            <input type="email" name="email" placeholder="Email" required><br>
            <strong>Your phone number:</strong>
            <input type="tel" name="phone_num" placeholder="Phone Number" required>
            <input type="hidden" id="bookIdInput" name="book_id">
            <button class="login-btn" type="submit">Submit Order</button>
          </form>
        </div>
    </div>
    <script src="userWindow.js"></script>
</body>
</html>