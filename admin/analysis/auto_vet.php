<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection
include('../connection/conn.php');

// Get the selected issues from the AJAX request
$issues = json_decode($_POST['issues'], true);

// Check if issues are provided
if (empty($issues)) {
    echo json_encode(["status" => "error", "message" => "No issues received for auto-vetting."]);
    exit;
}

// Log the received issues for debugging
error_log("Received issues: " . implode(", ", $issues));

// Build the SQL query dynamically based on selected issues
$updateColumns = [];
$affectedCounts = []; // This will hold the counts of affected rows for each issue

if (in_array("No birth certificate provided", $issues)) {
    $updateColumns[] = "no_birth_cert = IF(birth_cert_no IS NULL OR birth_cert_no = '0', 1, no_birth_cert)";
    $affectedCounts['No birth certificate provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE birth_cert_no IS NULL OR birth_cert_no = '0'";
}

if (in_array("No admission number provided", $issues)) {
    $updateColumns[] = "no_adm_no = IF(adm_no IS NULL OR adm_no = '' OR adm_no = '0', 1, no_adm_no)";
    $affectedCounts['No admission number provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE adm_no IS NULL OR adm_no = '' OR adm_no = '0'";
}

if (in_array("No school provided", $issues)) {
    $updateColumns[] = "no_school = IF(school IS NULL OR school = '' OR school = 'na', 1, no_school)";
    $affectedCounts['No school provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE school IS NULL OR school = '' OR school = 'na'";
}

if (in_array("No father id number provided", $issues)) {
    $updateColumns[] = "no_id_no = IF(id_number IS NULL OR id_number = '0', 1, no_id_no)";
    $affectedCounts['No father id number provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE id_number IS NULL OR id_number = '0'";
}

if (in_array("No mother id number provided", $issues)) {
    $updateColumns[] = "no_m_id_no = IF(m_id_number IS NULL OR m_id_number = '0', 1, no_m_id_no)";
    $affectedCounts['No mother id number provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE m_id_number IS NULL OR m_id_number = '0'";
}

if (in_array("No father details provided", $issues)) {
    $updateColumns[] = "no_father = IF(fname IS NULL OR fname = '' OR fname = 'na', 1, no_father)";
    $affectedCounts['No father details provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE fname IS NULL OR fname = '' OR fname = 'na'";
}

if (in_array("No mother details provided", $issues)) {
    $updateColumns[] = "no_mother = IF(mname IS NULL OR mname = '' OR mname = 'na', 1, no_mother)";
    $affectedCounts['No mother details provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE mname IS NULL OR mname = '' OR mname = 'na'";
}

if (in_array("No parents details provided", $issues)) {
    $updateColumns[] = "no_parents = IF((fname IS NULL OR fname = '' OR fname = 'na') AND (mname IS NULL OR mname = '' OR mname = 'na'), 1, no_parents)";
    $affectedCounts['No parents details provided'] = "SELECT COUNT(*) FROM test_data_teso WHERE (fname IS NULL OR fname = '' OR fname = 'na') AND (mname IS NULL OR mname = '' OR mname = 'na')";
}

if (in_array("Incomplete applicants", $issues)) {
    $updateColumns[] = "incomplete_applicants = IF(process_status = 'incomplete', 1, incomplete_applicants)";
    $affectedCounts['Incomplete applicants'] = "SELECT COUNT(*) FROM test_data_teso WHERE process_status = 'incomplete'";
}

// Only run the query if there are columns to update
if (!empty($updateColumns)) {
    $updateQuery = "UPDATE test_data_teso SET " . implode(", ", $updateColumns);
    
    // Log the generated SQL query for debugging
    error_log("Generated Update Query: " . $updateQuery);

    // Begin transaction for better error handling
    $conn->begin_transaction();

    try {
        if ($conn->query($updateQuery) === TRUE) {
            // Commit the update query
            $conn->commit();

            // After update, count affected rows and update vetting_issues table
            foreach ($affectedCounts as $issue => $countQuery) {
                $result = $conn->query($countQuery);
                $row = $result->fetch_row();
                $totalAffected = $row[0];

                // Update the vetting_issues table with the new count
                $updateVettingQuery = "UPDATE vetting_issues SET total_students_affected = $totalAffected, vet_status = 'vetted' WHERE issue_description = '$issue'";
                $conn->query($updateVettingQuery);
            }

            echo "Success: Auto-vetting completed successfully.";
        } else {
            throw new Exception("Error updating records: " . $conn->error);
        }
    } catch (Exception $e) {
        $conn->rollback();
        error_log("Transaction failed: " . $e->getMessage());
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo "Error: No valid issues selected for update.";
}

// Close the database connection
$conn->close();
?>