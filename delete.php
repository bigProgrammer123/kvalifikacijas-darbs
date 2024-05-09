<?php
function deleteBook($book_id) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ils";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM book WHERE book_id = $book_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminPage.php");
        exit();
    } else {
        echo "Error deleting book: " . $conn->error;
    }

    $conn->close();
}

if(isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    deleteBook($book_id);
} else {
    echo "Book ID not provided.";
}
?>
