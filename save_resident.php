<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bulk_sms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$ward = $_POST['ward'];
$location = $_POST['location'];
$sublocation = $_POST['sublocation'];
$status = $_POST['status'];

// Insert data to residents table
$sql = "INSERT INTO residents (full_name, phone, ward, location, sublocation, status)
VALUES ('$full_name', '$phone', '$ward', '$location', '$sublocation', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Resident saved successfully'); window.location.href='bulk.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
