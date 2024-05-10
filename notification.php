<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['viewed_user'])) {
  $viewed_user_id = $_GET['viewed_user'];
  $update_sql = "UPDATE user_question SET is_viewed = 1 WHERE question_id = $viewed_user_id";
  $conn->query($update_sql);
}

$q_sql = "SELECT * FROM user_question WHERE is_viewed = 0";
$q_result = $conn->query($q_sql);

$u_sql = "SELECT user_info.name, user_info.email, user_info.book_id, book.title, book.author, book.status, book.udk, book.structural_unit, book.cover_img 
          FROM user_info, book WHERE user_info.book_id = book.book_id";
$u_result = $conn->query($u_sql);

$conn->close();
?>

<div class="questions">
  <button class="btn" onClick="openNotif()">View New Users</button>
  <div class="notif" id="userNotif">
    <h2>New Users</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Question</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($q_result->num_rows > 0) {
          while ($row = $q_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><a href='adminPage.php?viewed_user=" . $row["question_id"] . "'>" . $row["name"] . "</a></td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["question"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='2'>No new users found</td></tr>";
        }
        ?>
      </tbody>
    </table>
    <h2>New Orders</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Book ID</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($u_result->num_rows > 0) {
          while ($row = $u_result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["book_id"] . "</td>";
              echo "<td><button class='view-order-btn' 
                data-name='" . $row["name"] . "'
                data-email='" . $row["email"] . "'
                data-book-id='" . $row["book_id"] . "'
                data-title='" . $row["title"] . "'
                data-author='" . $row["author"] . "'
                data-status='" . $row["status"] . "'
                data-udk='" . $row["udk"] . "'
                data-unit='" . $row["structural_unit"] . "'
                data-img='" . $row["cover_img"] . "'>View Order</button></td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No new orders found</td></tr>";
      }
        ?>
      </tbody>
    </table>
    <button onclick="closeNotif()">Close</button>
  </div>
</div>
<div id="notifModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeNotifModal()">&times;</span>
    <img id="modalImg" class="modal-img" src="" alt="book-cover">
    <p id="modalName"></p>
    <p id="modalEmail"></p>
    <p id="modalAuthor"></p>
    <p id="modalTitle"></p>
    <p id="modalBookID"></p>
    <p id="modalStatus"></p>
    <p id="modalUnit"></p>
    <p id="modalUdk"></p>
  </div>
</div>
<script src="notifications.js"></script>
