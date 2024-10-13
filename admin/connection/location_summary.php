<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$selectedWard = isset($_GET['ward']) ? $_GET['ward'] : '';

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
// Store fetched location data in an array
$locations = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
} else {
    $locations = [];
}

$stmt->close();
mysqli_close($conn);
?>
