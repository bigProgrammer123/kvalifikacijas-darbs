<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ils";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["submit"])) {
        $str = $_POST["search"];
        $sql = "SELECT * FROM book WHERE title LIKE '%$str%' OR author LIKE '%$str%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            }
        } else {
            echo "0 results found";
        }
    }
?>

