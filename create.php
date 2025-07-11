<?php
include 'connect.php'; 

$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


$sql = "CREATE TABLE barter_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    type VARCHAR(50),
    category VARCHAR(50),
    description TEXT,
    posted_by VARCHAR(100),
    posted_by2 VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
    echo "Table Created";
} else {
    echo "Error in creating table: " . $conn->error;
}

$conn->close();
?>
