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
        ?>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
            Title: <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
            Author: <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>
            Description: <textarea name="description" cols="30" rows="10" required><?php echo $row['description']; ?></textarea><br>
            Language: <input type="text" name="language" value="<?php echo $row['language']; ?>"><br>
            Cover Image: <?php if($row['cover_img']) { ?>
            <img class="modalImg" src="Images/<?php echo $row['cover_img']; ?>" alt="book-cover">
            <?php } ?>
            <input type="file" name="cover_img"><br>
            Type: <input type="text" name="type" value="<?php echo $row['type']; ?>"><br>
            Publishing date: <input type="text" name="publish_date" value="<?php echo $row['publish_date']; ?>"><br>
            Status: <input type="text" name="status" value="<?php echo $row['status']; ?>"><br>
            UDK: <input type="text" name="udk" value="<?php echo $row['udk']; ?>"><br>
            Price: <input type="text" step="any" name="price" value="<?php echo $row['price']; ?>"><br>
            External link: <input type="url" name="link_to_literature" value="<?php echo $row['link_to_literature']; ?>"><br>
            Inventory number: <input type="text" name="invent_num" value="<?php echo $row['invent_num']; ?>"><br>
            Structural unit: <input type="text" name="structural_unit" value="<?php echo $row['structural_unit']; ?>"><br>
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
