<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection
include('../connection/conn.php');

// Begin a transaction for better error handling
$conn->begin_transaction();

try {
    // Reset the vetting_issues table: Set vet_status to 'not_vetted' and total_students_affected to 0
    $resetVettingIssuesQuery = "UPDATE vetting_issues SET vet_status = 'not_vetted', total_students_affected = 0";
    if ($conn->query($resetVettingIssuesQuery) !== TRUE) {
        throw new Exception("Error resetting vetting_issues table: " . $conn->error);
    }


    // Commit the transaction if everything is successful
    $conn->commit();
    echo json_encode(["status" => "success", "message" => "Vetting issues reset successfully."]);

} catch (Exception $e) {
    // Rollback the transaction if an error occurs
    $conn->rollback();
    error_log("Transaction failed: " . $e->getMessage());
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}

// Close the database connection
$conn->close();
?>
