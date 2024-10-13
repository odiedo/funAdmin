<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "bulk_sms"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// (1800 seconds = 30 minutes)
$session_timeout = 1800; 

// Check if last activity is set
if (isset($_SESSION['last_activity'])) {
    $inactive_time = time() - $_SESSION['last_activity']; // Inactivity duration
    
    // Check if user has been inactive for too long
    if ($inactive_time > $session_timeout) {
        // Session expired, destroy the session
        session_unset();
        session_destroy();
        
        // Redirect to login page with a session expired message
        header("Location: ../index.php?session_timeout");
        exit();
    }
}

// Update last activity time to current time
$_SESSION['last_activity'] = time();
?>
