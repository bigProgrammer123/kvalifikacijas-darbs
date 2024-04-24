<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ils";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $language = $_POST['language'];
    $cover_img = $_POST['cover_img'];

    // Insert data into the database
    $sql = "INSERT INTO book (title, author, description, language, cover_img) VALUES ('$title', '$author', '$description', '$language', '$cover_img')";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminPage.php");
        // echo "New book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Title: <input type="text" name="title"><br>
    Author: <input type="text" name="author"><br>
    Description: <input type="text" name="description"><br>
    Language: <input type="text" name="language"><br>
    Cover Image URL: <input type="text" name="cover_img"><br>
    <input type="submit" value="Add Book">
</form>
</body>
</html>
