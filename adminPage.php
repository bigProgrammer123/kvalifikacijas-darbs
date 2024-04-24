<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
        /* Style for modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
    </style>
</head>
<body>
<button onclick="window.location.href='userPage.php'">Save & close</button>

<div id="modalContainer" class="modal"></div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ils";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM book";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='book'>";
            echo "<img class='book-cover' src='" . $row["cover_img"] . "' alt='book-cover'>";
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["author"] . "</p>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p>" . $row["language"] . "</p>";
            echo "<button onclick='openEditModal(" . $row["book_id"] . ")'>Edit</button>";
            echo "<a href='delete.php?book_id=" . $row["book_id"] . "'>Delete</a>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <button onclick="openAddModal()">Add</button>

<script>
    function openEditModal(bookId) {
        var modalContainer = document.getElementById("modalContainer");
        modalContainer.style.display = "block";
        modalContainer.innerHTML = "<iframe src='edit.php?book_id=" + bookId + "' style='width: 100%; height: 100%; border: none;'></iframe>";
    }

    function openAddModal() {
        var modalContainer = document.getElementById("modalContainer");
        modalContainer.style.display = "block";
        modalContainer.innerHTML = "<iframe src='add.php' style='width: 100%; height: 100%; border: none;'></iframe>";
    }
</script>
</body>
</html>
