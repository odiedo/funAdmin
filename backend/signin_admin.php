<?php
session_start();
include 'conn.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize email input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: ../index.php?invalid_email_format");
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, fullname, email, password FROM admin_user WHERE email = ? AND status = 'active' LIMIT 1");
    if (!$stmt) {
        // Log statement preparation errors
        error_log("Prepare statement failed: " . $conn->error);
        $_SESSION['error'] = "Something went wrong. Please try again later.";
        header("Location: ../index.php?stmt_prepare_failed");
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Regenerate session ID to prevent session fixation attacks
            session_regenerate_id();

            // Set session variables
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];

            // Redirect to the admin dashboard
            header("Location: ../admin/index.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: ../index.php");
            exit();
        }
    } else {
        // No user found
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../index.php");
        exit();
    }

    $stmt->close();
} else {
    // Invalid request method
    header("Location: ../index.php");
    exit();
}

$conn->close();
?>
