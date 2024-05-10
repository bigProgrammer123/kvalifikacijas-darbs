<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['question'])){
        $stmt = $conn->prepare("INSERT INTO user_question (name, email, question) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $question);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $question = $_POST['question'];
        $stmt->execute();

        $stmt->close();
        $conn->close();
        header("Location: userPage.php");
        exit();
    } else {
        echo "One or more required fields are not set.";
    }
}
?>
<div class="contact">
    <button class="contact-btn" onClick="openForm()">Contact us</button>
    <div class="form-popup" id="myForm">
    <form action="" class="form-container" method="POST">
      <h2>Question Form</h2>
      <label for="name"><b>Your full name:</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>

      <label for="email"><b>Your email:</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="question"><b>Your questions or comments:</b></label>
      <textarea placeholder="Enter your question" name="question" required></textarea>

      <button class="login-btn" type="submit" class="btn">Submit</button>
      <button class="login-btn" type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
