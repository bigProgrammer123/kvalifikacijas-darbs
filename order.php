<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone_num = $_POST['phone_num'];
$book_id = $_POST['book_id'];

// Prepare SQL statement to insert data into database
$sql = "INSERT INTO user_info (name, email, phone_num, book_id) VALUES ('$name', '$email', '$phone_num', '$book_id')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    header("Location: userPage.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
