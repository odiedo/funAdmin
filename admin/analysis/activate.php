<?php
include '../connection/conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['activate'])) {
        // add columns
        $alterQuery = "ALTER TABLE test_data_teso 
            -- autovetting
            ADD COLUMN no_birth_cert BOOLEAN DEFAULT 0,
            ADD COLUMN no_adm_no BOOLEAN DEFAULT 0,
            ADD COLUMN fee_structure BOOLEAN DEFAULT 0,
            ADD COLUMN no_school BOOLEAN DEFAULT 0,
            ADD COLUMN driving_school BOOLEAN DEFAULT 0,
            ADD COLUMN no_id_no BOOLEAN DEFAULT 0,
            ADD COLUMN no_m_id_no BOOLEAN DEFAULT 0,
            ADD COLUMN no_father BOOLEAN DEFAULT 0,
            ADD COLUMN no_mother BOOLEAN DEFAULT 0,
            ADD COLUMN no_parents BOOLEAN DEFAULT 0,

            -- manual vetting 
            ADD COLUMN same_parent_name BOOLEAN DEFAULT 0,
            ADD COLUMN same_father_name BOOLEAN DEFAULT 0,
            ADD COLUMN same_father_id_no BOOLEAN DEFAULT 0,
            ADD COLUMN same_mother_id_no BOOLEAN DEFAULT 0,
            ADD COLUMN same_student_name BOOLEAN DEFAULT 0,
            ADD COLUMN same_student_admission_no_and_school BOOLEAN DEFAULT 0,
            ADD COLUMN auto_vet_count BOOLEAN DEFAULT 0";


        if ($conn->query($alterQuery) === TRUE) {
            echo "Success: Analysis Process Activated successfully!";
        } else {
            echo "Error: Error Activating Analysis Process!: " . $conn->error;
        }
    } else {
        echo "Error: Activate button not clicked.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
