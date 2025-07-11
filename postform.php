<?php
session_start();
include 'connect.php';

$stmt = $conn->prepare("SELECT * FROM barter_posts WHERE posted_by = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Post a Barter</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background: white;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 500px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    form input[type="text"],
    form select,
    form textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
      transition: 0.3s;
    }

    form textarea {
      resize: vertical;
      height: 120px;
    }

    form input:focus,
    form select:focus,
    form textarea:focus {
      outline: none;
      border-color: #4f46e5;
      box-shadow: 0 0 4px rgba(79, 70, 229, 0.4);
    }

    button {
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

    button:hover {
      background-color: #4338ca;
    }

  </style>
</head>
<body>
  <div class="form-container">
    <h2>Post a New Barter</h2>
    <form action="submitform.php" method="POST">
      <input type="text" name="title" placeholder="Title" required>
      
      <select name="type">
        <option>Offer</option>
        <option>Request</option>
      </select>
      
      <select name="category">
        <option>Skill</option>
        <option>Notes</option>
        <option>Book</option>
        <option>Equipment</option>
      </select>
      
      <textarea name="description" placeholder="Describe your barter..." required></textarea>
      
      <input type="text" name="posted_by" placeholder="Your Email" required>
      <input type="text" name="posted_by2" placeholder="Your Name" required>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
