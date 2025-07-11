<?php
session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    die("Unauthorized access.");
}

if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
    $user_email = $_SESSION['email'];

    // Verify that this post belongs to the logged-in user
    $checkQuery = "SELECT * FROM barter_posts WHERE id = $post_id AND posted_by = '$user_email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $deleteQuery = "DELETE FROM barter_posts WHERE id = $post_id";
        if (mysqli_query($conn, $deleteQuery)) {
            header("Location: my_post.php"); // redirect back to post list
            exit();
        } else {
            echo "Error deleting post.";
        }
    } else {
        echo "You are not authorized to delete this post.";
    }
} else {
    echo "Invalid request.";
}
?>
