<?php
$servername = "localhost";
$username = "root"; // Change to your DB username
$password = ""; // Change to your DB password
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$blood_type = $_POST['blood_type'];
$donation_date = date('Y-m-d'); // Current date

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO donors (name, email, phone, blood_type, donation_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $blood_type, $donation_date);

// Execute the statement
if ($stmt->execute()) {
    echo "Thank you for your donation!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
