<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        .message {
            font-size: 50px;
            font-weight: bold;
        }
        .success{
            font-size: 20px;
            color: #008000;
        }
    </style>
    <script>
        // Redirect to index.html after 3 seconds (3000 milliseconds)
        setTimeout(function() {
        window.location.href = "home.html";
        }, 3000);
    </script>
</head>
<body>
    <div style="text-align:center; padding:15%;">
        <p class="message">
        Hello 
        <?php 
            if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
            if ($row = mysqli_fetch_array($query)) {
                echo $row['firstName'] . ' ' . $row['lastName'];
            }
            }
        ?> :) 
        <br>
        <span class="success">Successfully Logged in</span>
        </p>
    </div>
</body>
</html>