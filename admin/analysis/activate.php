<?php
include '../connection/conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['activate'])) {
        // SQL query to add the columns
        $alterQuery = "ALTER TABLE test_data_teso 
                       ADD COLUMN no_birth BOOLEAN DEFAULT 0,
                       ADD COLUMN no_fee_structure BOOLEAN DEFAULT 0,
                       ADD COLUMN same_parent BOOLEAN DEFAULT 0";

        if ($conn->query($alterQuery) === TRUE) {
            echo "Analysis Process Activated successfully!";
        } else {
            echo "Error Activating Analysis Process!: " . $conn->error;
        }
    } else {
        echo "Activate button not clicked.";
    }
} else {
    echo "Invalid request method.";
}
?>
