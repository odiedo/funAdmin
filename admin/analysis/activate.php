<?php
include '../connection/conn.php';

if (isset($_POST['add_columns'])) {
    // add the columns
    $alterQuery = "ALTER TABLE test_data_teso 
                   ADD COLUMN no_birth BOOLEAN DEFAULT 0,
                   ADD COLUMN no_fee_structure BOOLEAN DEFAULT 0,
                   ADD COLUMN same_parent BOOLEAN DEFAULT 0";

    if ($conn->query($alterQuery) === TRUE) {
        echo "Columns added successfully!";
    } else {
        echo "Error adding columns: " . $conn->error;
    }
}
?>
