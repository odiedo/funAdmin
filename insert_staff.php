<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert_staff'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bulk_sms"; // Update with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
