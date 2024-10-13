<?php
include('connection/conn.php');
include('connection/header.php');
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
