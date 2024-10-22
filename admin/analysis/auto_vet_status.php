<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../connection/conn.php');

//Count vetted issues
$issuesQuery = "SELECT COUNT(*) AS vetted_issues FROM vetting_issues WHERE vet_status = 'vetted'";
$issuesResult = $conn->query($issuesQuery);
$vettedIssues = $issuesResult->fetch_assoc()['vetted_issues'];

//total students affected
$studentsQuery = "SELECT SUM(total_students_affected) AS total_affected FROM vetting_issues WHERE vet_status = 'vetted'";
$studentsResult = $conn->query($studentsQuery);
$totalAffected = $studentsResult->fetch_assoc()['total_affected'];

// Return the data as JSON
echo json_encode([
    "vetted_issues" => $vettedIssues,
    "total_affected" => $totalAffected
]);

$conn->close();
?>
