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
    $cover_img = $_FILES['cover_img']['name'];
    $type = $_POST['type'];
    $publish_date = $_POST['publish_date'];
    $status = $_POST['status'];
    $udk = $_POST['udk'];
    $link_to_literature = $_POST['link_to_literature'];
    $invent_num = $_POST['invent_num'];
    $price = $_POST['price'];
    $structural_unit = $_POST['structural_unit'];

    $folder = "Images/";
    $img = $folder . basename($_FILES["cover_img"]["name"]);
    
    if ($_FILES['cover_img']['name']) {
        $cover_img = $_FILES['cover_img']['name'];
        $folder = "Images/";
        $img = $folder . basename($_FILES["cover_img"]["name"]);
        move_uploaded_file($_FILES["cover_img"]["tmp_name"], $img);

        $sql = "UPDATE book SET title='$title', author='$author', description='$description', language='$language', type='$type', publish_date='$publish_date', status='$status', udk='$udk', link_to_literature='$link_to_literature', invent_num='$invent_num', price='$price', structural_unit='$structural_unit', cover_img='$cover_img' WHERE book_id=$book_id";
    } else {
        $sql = "UPDATE book SET title='$title', author='$author', description='$description', language='$language', type='$type', publish_date='$publish_date', status='$status', udk='$udk', link_to_literature='$link_to_literature', invent_num='$invent_num', price='$price', structural_unit='$structural_unit' WHERE book_id=$book_id";
    }
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
