<?php
include 'config.php';

$title = $_POST['title'];
$type = $_POST['type'];
$category = $_POST['category'];
$description = $_POST['description'];
$posted_by = $_POST['posted_by'];
$posted_by2 = $_POST['posted_by2'];

$query = "INSERT INTO barter_posts (title, type, category, description, posted_by, posted_by2)
          VALUES ('$title', '$type', '$category', '$description', '$posted_by', '$posted_by2')";

if (mysqli_query($conn, $query)) {
  header("Location: barter.php");
} else {
  echo "Error: " . mysqli_error($conn);
}
?>
