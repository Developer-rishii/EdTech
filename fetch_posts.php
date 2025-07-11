<?php
include 'config.php';

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
$type = $_GET['type'] ?? '';

$query = "SELECT * FROM barter_posts WHERE 1";

if (!empty($search)) {
  $safeSearch = mysqli_real_escape_string($conn, $search);
  $query .= " AND (title LIKE '%$safeSearch%' OR description LIKE '%$safeSearch%')";
}
if (!empty($category)) {
  $safeCategory = mysqli_real_escape_string($conn, $category);
  $query .= " AND category = '$safeCategory'";
}
if (!empty($type)) {
  $safeType = mysqli_real_escape_string($conn, $type);
  $query .= " AND type = '$safeType'";
}

$query .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)): ?>
  <div class="card">
    <span class="badge"><?= $row['type'] ?></span>
    <span class="badge"><?= $row['category'] ?></span>
    <h3 class="h3"><?= htmlspecialchars($row['title']) ?></h3>
    <p><?= htmlspecialchars($row['description']) ?></p>
    <p><small>Posted by: <?= $row['posted_by2'] ?></small></p>
    <p class="p2"><small>Posted on: <?= date("d M Y", strtotime($row['created_at'])) ?></small></p>
  </div>
<?php endwhile; ?>
