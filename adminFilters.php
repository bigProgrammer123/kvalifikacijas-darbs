<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ils";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_languages = "SELECT DISTINCT language FROM book";
$result_languages = $conn->query($sql_languages);

$sql_authors = "SELECT DISTINCT author FROM book";
$result_authors = $conn->query($sql_authors);

$sql_udk = "SELECT DISTINCT udk FROM book";
$result_udk = $conn->query($sql_udk);

$sql_price = "SELECT DISTINCT price FROM book";
$result_price = $conn->query($sql_price);
?>
<div class="a-filter">
  <!-- Language UI -->
  <div class="lang">
    <select id="a-languageFilter">
      <option value="all">All Languages</option>
      <?php
      while ($row = $result_languages->fetch_assoc()) {
          echo "<option value='" . $row['language'] . "'>" . $row['language'] . "</option>";
      }
      ?>
    </select>
  </div>
    <!-- Author UI -->
  <div class="auth">
    <select id="a-authorFilter">
      <option value="all">All Authors</option>
      <?php
      while ($row = $result_authors->fetch_assoc()) {
          echo "<option value='" . $row['author'] . "'>" . $row['author'] . "</option>";
      }
      ?>
    </select>
  </div>
    <!-- UDK UI -->
  <div class="udk">
    <select id="a-udkFilter">
      <option value="all">All Types</option>
      <?php
      while ($row = $result_udk->fetch_assoc()) {
          echo "<option value='" . $row['udk'] . "'>" . $row['udk'] . "</option>";
      }
      ?>
    </select>
  </div>
    <!-- Price UI -->
  <div class="price">
    <select id="a-priceFilter">
      <option value="all">All Prices</option>
      <?php
      while ($row = $result_price->fetch_assoc()) {
          echo "<option value='" . $row['price'] . "'>" . $row['price'] . "</option>";
      }
      ?>
    </select>
    <button class="a-filter-btn" onclick="resetFilter()">Reset</button>
  </div>
</div>

<?php
$conn->close();
?>