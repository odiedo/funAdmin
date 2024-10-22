<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$selectedlocation = isset($_GET['location']) ? $_GET['location'] : '';

// Store fetched sublocation data in an array
$sublocations = [];

//check in dashboard_summary_ward
$stmt = $conn->prepare("
    SELECT sublocation, sublocation_tot 
    FROM dashboard_summary_ward  
    WHERE location = ?
    GROUP BY sublocation
    ORDER BY sublocation
");
$stmt->bind_param("s", $selectedlocation);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sublocations[] = $row;
    }
} else {
    // If no records found in dashboard_summary_ward, check dashboard_summary_other_ward
    $stmt->close();

    $stmt = $conn->prepare("
        SELECT sublocation, sublocation_tot 
        FROM dashboard_summary_other_ward  
        WHERE location = ?
        GROUP BY sublocation
        ORDER BY sublocation
    ");
    $stmt->bind_param("s", $selectedlocation);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sublocations[] = $row;
        }
    }
}

$stmt->close();
$conn->close();
?>
