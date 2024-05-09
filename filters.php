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

$sql_genres = "SELECT DISTINCT genre FROM book";
$result_genres = $conn->query($sql_genres);
?>

<!-- Language UI -->
<select id="languageFilter">
  <option value="all">All Languages</option>
  <?php
  // Populate language options
  while ($row = $result_languages->fetch_assoc()) {
      echo "<option value='" . $row['language'] . "'>" . $row['language'] . "</option>";
  }
  ?>
</select>

<!-- Author UI -->
<select id="authorFilter">
  <option value="all">All Authors</option>
  <?php
  // Populate author options
  while ($row = $result_authors->fetch_assoc()) {
      echo "<option value='" . $row['author'] . "'>" . $row['author'] . "</option>";
  }
  ?>
</select>

<!-- Genre UI -->
<select id="genreFilter">
  <option value="all">All Genres</option>
  <?php
  // Populate genre options
  while ($row = $result_genres->fetch_assoc()) {
      echo "<option value='" . $row['genre'] . "'>" . $row['genre'] . "</option>";
  }
  ?>
</select>
<button onclick="resetFilter()">Reset</button>

<?php
$conn->close();
?>