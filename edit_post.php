<?php
session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    die("Unauthorized access.");
}

if (!isset($_GET['id'])) {
    die("No post ID provided.");
}

$post_id = intval($_GET['id']);
$user_email = $_SESSION['email'];

// Fetch the post to edit
$query = "SELECT * FROM barter_posts WHERE id = $post_id AND posted_by = '$user_email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) != 1) {
    die("Post not found or you don't have permission to edit it.");
}

$post = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="barter.css">
</head>
<style>
  .form-container {
    background: white;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 500px;
    margin: 40px auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .form-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
  }

  .form-container label {
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
    color: #444;
  }

  .form-container input[type="text"],
  .form-container textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    transition: 0.3s;
  }

  .form-container textarea {
    resize: vertical;
    height: 120px;
  }

  .form-container input:focus,
  .form-container textarea:focus {
    outline: none;
    border-color: #4f46e5;
    box-shadow: 0 0 4px rgba(79, 70, 229, 0.4);
  }

  .form-container button {
    background-color: #4f46e5;
    color: white;
    padding: 12px;
    width: 100%;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .form-container button:hover {
    background-color: #4338ca;
  }
</style>
<body>
  <div class="form-container">
    <h2>Edit Post</h2>
    <form method="POST" action="update_post.php">
      <input type="hidden" name="id" value="<?= $post['id'] ?>">

      <label>Title:</label>
      <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>

      <label>Description:</label>
      <textarea name="description" rows="5" required><?= htmlspecialchars($post['description']) ?></textarea>

      <label>Type:</label>
      <input type="text" name="type" value="<?= htmlspecialchars($post['type']) ?>" required>

      <label>Category:</label>
      <input type="text" name="category" value="<?= htmlspecialchars($post['category']) ?>" required>

      <button type="submit">Update Post</button>
    </form>
  </div>
</body>
</html>
