<?php
include('connection/conn.php');
include('connection/header.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert_staff'])) {

    // Get form input values
    $fullname = $_POST['fullname'];
    $office = $_POST['office'];
    $employee_post = $_POST['employee_post'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    // Insert staff data into the database
    $sql = "INSERT INTO staff (fullname, office, employee_post, phone, status) 
            VALUES ('$fullname', '$office', '$employee_post', '$phone', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Staff data inserted successfully!'); window.location.href='bulk.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
