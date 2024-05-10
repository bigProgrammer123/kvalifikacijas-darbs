<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $language = $_POST['language'];
    $cover_img = $_FILES['cover_img']['name'];
    $type = $_POST['type'];
    $udk = $_POST['udk'];
    $price = $_POST['price'];
    $link_to_literature = $_POST['link_to_literature'];
    $structural_unit = $_POST['structural_unit'];
    $publish_date = $_POST['publish_date'];
    $status = $_POST['status'];
    $invent_num = $_POST['invent_num'];

    $folder = "Images/";
    $img = $folder . basename($_FILES["cover_img"]["name"]);

    $sql = "INSERT INTO book (title, author, description, language, cover_img, type, udk, price, link_to_literature, structural_unit, publish_date, status, invent_num) VALUES ('$title', '$author', '$description', '$language', '$cover_img', '$type', '$udk', '$price', '$link_to_literature', '$structural_unit', '$publish_date', '$status', '$invent_num')";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminPage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title> 
</head>
<body>
        
        <div id="addModal" class="modalAdd">
        <div class="modal-content">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-md-5">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
        </div>
        <div class="col-md-5">
            <strong>Author:</strong>
            <input type="text" name="author" class="form-control" placeholder="Author" required>
        </div>
        <div class="col-md-5">
            <strong>Description:</strong>
            <textarea name="description" class="form-control" cols="30" rows="10" required></textarea>
        </div>
        <div class="col-md-5">
            <strong>Language:</strong>
            <input type="text" name="language" class="form-control" placeholder="Language" required>
        </div>
        <div class="col-md-5">
            <strong>Image:</strong>
            <input type="file" name="cover_img" class="form-control" required>
        </div>
        <div class="col-md-5">
            <strong>Type:</strong>
            <input type="text" name="type" class="form-control" placeholder="Type" required>
        </div>
        <div class="col-md-5">
            <strong>Publishing date:</strong>
            <input type="text" name="publish_date" class="form-control" required>
        </div>
        <div class="col-md-5">
            <strong>Status:</strong>
            <input type="text" name="status" class="form-control" placeholder="Status" required>
        </div>
        <div class="col-md-5">
            <strong>UDK:</strong>
            <input type="text" name="udk" class="form-control" placeholder="UDK" required>
        </div>
        <div class="col-md-5">
            <strong>Price:</strong>
            <input type="text" step="any" name="price" class="form-control" placeholder="Price" required>
        </div>
        <div class="col-md-5">
            <strong>External link to publication:</strong>
            <input type="url" name="link_to_literature" class="form-control" placeholder="Link" required>
        </div>
        <div class="col-md-5">
            <strong>Inventory number:</strong>
            <input type="text" name="invent_num" class="form-control" placeholder="Num"required>
        </div>
        <div class="col-md-5">
            <strong>Structural unit:</strong>
            <input type="text" name="structural_unit" class="form-control" placeholder="Structural unit" required>
        </div>
        <div class="col-md-2">
            <br/>
            <button onClick="submitModal()" type="submit" class="btn btn-success">Upload</button>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
    </div>
</form>
</div>
    <script src="adminWindow.js"></script>
</body>
</html>