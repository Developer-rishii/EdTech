<?php
include 'connect.php';


$sql1 = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


$sql2 = "CREATE TABLE IF NOT EXISTS barter_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    type VARCHAR(50),
    category VARCHAR(50),
    description TEXT,
    posted_by VARCHAR(100),
    posted_by2 VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


$sql3 = "CREATE TABLE IF NOT EXISTS experiments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    aim TEXT,
    video_url VARCHAR(500),
    experiment_no INT
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table 'users' created successfully.<br>";
} else {
    echo "Error creating 'users': " . $conn->error . "<br>";
}

if ($conn->query($sql2) === TRUE) {
    echo "Table 'barter_posts' created successfully.<br>";
} else {
    echo "Error creating 'barter_posts': " . $conn->error . "<br>";
}

if ($conn->query($sql3) === TRUE) {
    echo "Table 'experiments' created successfully.<br>";
} else {
    echo "Error creating 'experiments': " . $conn->error . "<br>";
}

$conn->close();
?>
