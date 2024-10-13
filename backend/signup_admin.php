<?php
include('conn.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $idnumber = $_POST['idnumber'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO admin_user (fullname, email, id_number, status, phone_number, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $fullname, $email, $idnumber, $status, $phone, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Account created successfully!'); window.location.href = '../index.php';</script>";
    } else {
        echo "<script>alert('Error: Could not create account.'); window.location.href = '../signup.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
