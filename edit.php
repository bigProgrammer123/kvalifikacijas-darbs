<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sql = "SELECT * FROM book WHERE book_id=$book_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display form with book details pre-filled
        ?>
        <form action="update.php" method="post">
            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
            Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
            Author: <input type="text" name="author" value="<?php echo $row['author']; ?>"><br>
            Description: <input type="text" name="description" value="<?php echo $row['description']; ?>"><br>
            Language: <input type="text" name="language" value="<?php echo $row['language']; ?>"><br>
            Cover Image URL: <input type="text" name="cover_img" value="<?php echo $row['cover_img']; ?>"><br>
            <input type="submit" value="Submit">
        </form>
        <?php
    } else {
        echo "Book not found.";
    }
} else {
    echo "Invalid request.";
}
$conn->close();
?>
</body>
</html>
