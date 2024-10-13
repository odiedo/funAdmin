<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the selected sublocation from the URL parameters
$selectedlocation = isset($_GET['location']) ? $_GET['location'] : '';

// Prepare the SQL statement to fetch the sublocation data
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

// Store fetched sublocation data in an array
$sublocations = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sublocations[] = $row;
    }
} else {
    $sublocations = [];
}

$stmt->close();
mysqli_close($conn);
?>
