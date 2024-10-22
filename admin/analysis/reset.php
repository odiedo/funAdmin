<?php
include '../connection/conn.php'; 

if (isset($_POST['reset'])) {
    // reset columns
    $columns = ['no_birth_cert', 'no_adm_no', 'fee_structure', 'no_school', 'driving_school', 'no_id_no', 'no_m_id_no', 'no_father', 'no_mother', 'no_parents', 'same_parent_name', 'same_father_name', 'same_father_id_no', 'same_mother_id_no', 'same_student_name', 'same_student_admission_no_and_school', 'auto_vet_count'];

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
        echo "Success: Analysis Data Has Been Reset Successfully.";
    } elseif ($alreadyReset) {
        echo "Error: The data has already been reset.";
    } else {
        echo "Error: Failed to reset Analysis Data.";
    }
}

$conn->close();
?>
