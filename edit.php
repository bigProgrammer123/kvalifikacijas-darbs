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
        <form class="modal-form" action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
            <strong>Title: </strong>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
            <strong>Author: </strong>
            <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>
            <strong>Description: </strong>
            <textarea name="description" cols="70" rows="5" required><?php echo $row['description']; ?></textarea><br>
            <strong>Language: </strong>
            <input type="text" name="language" value="<?php echo $row['language']; ?>"><br>
            <strong>Cover Image: </strong>
            <?php if($row['cover_img']) { ?>
            <img class="modalImg" src="Images/<?php echo $row['cover_img']; ?>" alt="book-cover">
            <?php } ?>
            <input type="file" name="cover_img"><br>
            <strong>Type: </strong>
            <input type="text" name="type" value="<?php echo $row['type']; ?>"><br>
            <strong>Publishing date: </strong>
            <input type="text" name="publish_date" value="<?php echo $row['publish_date']; ?>"><br>
            <strong>Status: </strong>
            <input type="text" name="status" value="<?php echo $row['status']; ?>"><br>
            <strong>UDK: </strong>
            <input type="text" name="udk" value="<?php echo $row['udk']; ?>"><br>
            <strong>Price: </strong>
            <input type="text" step="any" name="price" value="<?php echo $row['price']; ?>"><br>
            <strong>External link: </strong>
            <input type="url" name="link_to_literature" value="<?php echo $row['link_to_literature']; ?>"><br>
            <strong>Inventory number: </strong>
            <input type="text" name="invent_num" value="<?php echo $row['invent_num']; ?>"><br>
            <strong>Structural unit: </strong>
            <input type="text" name="structural_unit" value="<?php echo $row['structural_unit']; ?>"><br>
            <input class="nav-btn" type="submit" value="Save&close">
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
