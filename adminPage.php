<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
     <link rel="stylesheet" href="style/style.css">
</head>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ils";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $view = isset($_GET['view']) ? $_GET['view'] : 'books';

        if($view === 'books') {
            $sql = "SELECT * FROM book";
            $toggleView = 'users';
        } elseif($view === 'users') {
            $sql = "SELECT * FROM user_info";
            $toggleView = 'books';
        }

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

        ?>
<body id="bodyAdmin">
    <div class="nav">
        <form action="" method="POST" class="a-search-bar">
          <input class="a-search-input" id="search" name="search" type="text" placeholder="Search...">
          <input class="a-search-btn" id="submit" name="submit" type="submit" value="Search">
        </form>
        <button class="nav-btn" onclick="window.location.href='userPage.php'">Save & close</button>
        <button class="nav-btn" onclick="window.location.href='?view=<?php echo $toggleView; ?>'">
            View <?php echo ucfirst($toggleView); ?>
        </button>
        <button class="nav-btn" type="button" onclick="openModal()">Add</button>
        <?php include 'add.php' ?>
        <?php include 'notification.php' ?>
        <?php include 'adminFilters.php'; ?>
        <?php include 'searchbar.php'; ?>
        <script src="filter.js"></script>
    </div>
    <!-- Modal -->
    <div id="editModal" class="modal">
    <div id="editModalContent" class="modal-content">
        <span class="nav-btn" onclick="closeEditModal()">&times;</span>
    </div>
    </div>
        <div class="book-list">
        <?php

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($view === 'books') {
                    echo "<div class='item'>";
                    echo "<p>" . $row["title"] . "</p>";
                    echo "<p>" . $row["author"] . "</p>";
                    echo "<p>" . $row["language"] . "</p>";
                    echo "<button class='btn' onclick='openEditModal(" . $row["book_id"] . ")'>Edit</button>";
                    echo "<a class='btn' style='text-decoration: none;' href='delete.php?book_id=" . $row["book_id"] . "'>Delete</a>";
                    echo "</div>";
                } elseif($view === 'users') {
                    echo "<div class='user'>";
                    echo "<p>Name: " . $row["name"] . "</p>";
                    echo "<p>Email: " . $row["email"] . "</p>";
                    echo "<p>Phone: " . $row["phone_num"] . "</p>";
                    echo "</div>";
                }
            }
        } else {
            echo "0 results";
        }
    ?>
    </div>
    <script src="adminWindow.js"></script>
</body>
</html>