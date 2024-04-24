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

// Retrieve username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if the provided credentials exist in the database
$sql = "SELECT * FROM admin_info WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['loggedin'] = true;
    header("Location: adminPage.php");
} else {
    $_SESSION['login_error'] = "Wrong username or password";
    header("Location: userPage.php");
}

$conn->close();
?>
