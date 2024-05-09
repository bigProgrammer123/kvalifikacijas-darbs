<?php  

require('add.php');  

session_start();  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
if(isset($_POST) && !empty($_FILES['cover_img']['name']) && !empty($_POST['title'])){  
  
    $name = $_FILES['cover_img']['name'];  
    list($txt, $ext) = explode(".", $name);  
    $image_name = time().".".$ext;  
    $tmp = $_FILES['cover_img']['tmp_name'];  
  
    if(move_uploaded_file($tmp, 'ils/'.$image_name)){  
  
        $sql = "INSERT INTO book (title, cover_img) VALUES ('".$_POST['title']."', '".$image_name."')";  
        $conn->query($sql);  
  
        $_SESSION['success'] = 'Image uploaded successfully.';  
        header("Location: adminPage.php");  
    }else{  
        $_SESSION['error'] = 'Failed to upload the image';  
        header("Location: add.php");  
    }  
}else{  
    $_SESSION['error'] = 'Please Select Image or Write title';  
    header("Location: add.php");  
}  
  
?>  