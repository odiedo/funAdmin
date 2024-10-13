<?php
include 'connection.php';

$query = "SELECT * FROM dashboard_summary_one LIMIT 1";
$result = mysqli_query($conn, $query);

// Check if data is available
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Assign values to variables
    $total_applications = $row['total_app'];
    $pwds = $row['pwds'];
    $partial_orphans = $row['partial_orphans'];
    $total_orphans = $row['total_orphans'];
    $single_parents = $row['single_parents'];
    $others = $row['others'];
} else {
    // Default values if no data is found
    $total_applications = 0;
    $pwds = 0;
    $partial_orphans = 0;
    $total_orphans = 0;
    $single_parents = 0;
    $others = 0;
}
?>
