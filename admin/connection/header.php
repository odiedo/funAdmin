<?php
// Check if the user is logged in
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['fullname'])) {
    header("Location: ../index.php?session_expired");
    exit();
}
?>