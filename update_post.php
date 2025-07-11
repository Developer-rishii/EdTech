<?php
session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    die("Unauthorized access.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = intval($_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $email = $_SESSION['email'];

    // Ensure the post belongs to the user
    $check = "SELECT * FROM barter_posts WHERE id = $post_id AND posted_by = '$email'";
    $res = mysqli_query($conn, $check);

    if (mysqli_num_rows($res) === 1) {
        $update = "UPDATE barter_posts SET title='$title', description='$description', type='$type', category='$category' WHERE id=$post_id";
        if (mysqli_query($conn, $update)) {
            header("Location: my_post.php");
            exit();
        } else {
            echo "Error updating post.";
        }
    } else {
        echo "Unauthorized action.";
    }
}
?>
