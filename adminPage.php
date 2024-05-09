<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
     <link rel="stylesheet" href="style/style.css">
</head>
<body>
<button onclick="window.location.href='userPage.php'">Save & close</button>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ils";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// add notification button for user messages, seperate from information about user that ordered a book
    $sql = "SELECT * FROM book";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='book'>";
            echo "<img class='book-cover' src='" . $row["cover_img"] . "' alt='book-cover'>";
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["author"] . "</p>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p>" . $row["language"] . "</p>";
            echo "<a href='edit.php?book_id=" . $row["book_id"] . "'>Edit</a>";
            echo "<a href='delete.php?book_id=" . $row["book_id"] . "'>Delete</a>";
            echo "<a href='add.php'>Add</a>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>