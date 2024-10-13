<?php
include '../connection/conn.php'; 

if (isset($_POST['reset'])) {
    // reset columns
    $columns = ['no_birth', 'no_fee_structure', 'same_parent'];

    $dropSuccess = true;
    $alreadyReset = true;

    foreach ($columns as $column) {
        // Check if the column exists before attempting to drop it
        $checkColumn = "SHOW COLUMNS FROM test_data_teso LIKE '$column'";
        $result = $conn->query($checkColumn);

        if ($result->num_rows > 0) {
            // Column exists, proceed to drop it
            $sql = "ALTER TABLE test_data_teso DROP COLUMN `$column`";
            if (!$conn->query($sql)) {
                $dropSuccess = false;
            }
            $alreadyReset = false;
        }
    }

    // Return message based
    if ($dropSuccess && !$alreadyReset) {
        echo "success: Analysis Data Has Been Reset Successfully.";
    } elseif ($alreadyReset) {
        echo "error: The data has already been reset.";
    } else {
        echo "error: Failed to reset Analysis Data.";
    }
}

$conn->close();
?>
