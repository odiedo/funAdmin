<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$selectedWard = isset($_GET['ward']) ? $_GET['ward'] : '';

$locations = [];

$stmt = $conn->prepare("
    SELECT location, location_tot 
    FROM dashboard_summary_ward 
    WHERE ward = ?
    GROUP BY location
    ORDER BY location
");
$stmt->bind_param("s", $selectedWard);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
} else {
    // check dashboard_summary_other_ward If no records found
    $stmt->close();

    $stmt = $conn->prepare("
        SELECT location, location_tot 
        FROM dashboard_summary_other_ward 
        WHERE ward = ?
        GROUP BY location
        ORDER BY location
    ");
    $stmt->bind_param("s", $selectedWard);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // If records found in dashboard_summary_other_ward
        while ($row = $result->fetch_assoc()) {
            $locations[] = $row;
        }
    }
}

$stmt->close();
$conn->close();
?>
