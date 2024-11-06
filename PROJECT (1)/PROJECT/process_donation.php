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
$amount = $_POST['amount'];
$card_number = $_POST['card_number'];
$card_expiry = $_POST['card_expiry'];
$card_cvv = $_POST['card_cvv'];

// TODO: Implement actual payment processing here

// Store donation in database
$sql = "INSERT INTO donations (name, phone, email, amount) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssd", $name, $phone, $email, $amount);

if ($stmt->execute()) {
    echo "Donation processed successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>