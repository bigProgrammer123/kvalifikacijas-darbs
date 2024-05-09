<?php
session_start();  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $language = $_POST['language'];
    $cover_img = $_POST['cover_img'];

    $sql = "UPDATE book SET title='$title', author='$author', description='$description', language='$language', cover_img='$cover_img' WHERE book_id=$book_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminPage.php");
        exit;
    } else {
        echo "Error updating book: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
$conn->close();
?>
