<?php
include 'config.php';

$sql = "SELECT * FROM experiments ORDER BY id DESC";
$result = $conn->query($sql);

$experiments = [];

while ($row = $result->fetch_assoc()) {
    $experiments[] = $row;
}

header('Content-Type: application/json');
echo json_encode($experiments);

$conn->close();
?>
