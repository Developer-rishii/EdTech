<?php
include 'connect.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (
    isset($_POST['title']) && isset($_POST['aim']) &&
    isset($_POST['video_url']) && isset($_POST['experiment_no'])
) {
    $title = $conn->real_escape_string($_POST['title']);
    $aim = $conn->real_escape_string($_POST['aim']);
    $video_url = $conn->real_escape_string($_POST['video_url']);
    $experiment_no = $conn->real_escape_string($_POST['experiment_no']);

    $sql = "INSERT INTO experiments (title, aim, video_url, experiment_no)
            VALUES ('$title', '$aim', '$video_url', '$experiment_no')";

    if ($conn->query($sql) === TRUE) {
        echo "Success";
    } else {
        echo "DB Error: " . $conn->error;
    }
} else {
    echo "Missing required fields.";
}
?>
