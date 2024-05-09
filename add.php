<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title> 
</head>
<body>
<?php
session_start();  

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
<form action="imageUpload.php" method="POST" enctype="multipart/form-data">

<?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Our input faces some problems. <br><br>
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>

        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">?</button>
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>  
        <?php unset($_SESSION['success']); } ?>
        
            <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-5">
                <strong>Author:</strong>
                <input type="text" name="author" class="form-control" placeholder="Author">
            </div>
            <div class="col-md-5">
                <strong>Description:</strong>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
            <div class="col-md-5">
                <strong>Language:</strong>
                <input type="text" name="language" class="form-control" placeholder="Language">
            </div>
            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="cover_img" class="form-control">
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
</body>
</html>