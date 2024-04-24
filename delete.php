<?php
// delete.php handles deleting a book

function deleteBook($book_id) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ils";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the book
    $sql = "DELETE FROM book WHERE book_id = $book_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect or display a success message after deletion
        header("Location: adminPage.php"); // Redirect back to the main page after deletion
        exit();
    } else {
        // Handle error if deletion fails
        echo "Error deleting book: " . $conn->error;
    }

    $conn->close();
}

// Check if book_id is set in the URL
if(isset($_GET['book_id'])) {
    // Call deleteBook function if book_id is set
    $book_id = $_GET['book_id'];
    deleteBook($book_id);
} else {
    echo "Book ID not provided.";
}
?>
