<?php
$servername = "localhost";
$username = "reese";
$password = "user12345";
$dbname = "reliefkenya_db";

// Create connection
$conn = new mysqli(localhost, reese, user12345, reliefkenya_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$campaign_title = $_POST['campaign_title'];
$campaign_description = $_POST['campaign_description'];
$campaign_goal = $_POST['campaign_goal'];

// Store campaign in database
$sql = "INSERT INTO campaigns (name, phone, email, title, description, goal) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssd", $name, $phone, $email, $campaign_title, $campaign_description, $campaign_goal);

if ($stmt->execute()) {
    echo "Campaign created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>