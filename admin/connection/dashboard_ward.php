<?php
include 'conn.php';

// Fetch unique ward data from the dashboard_summary_ward table
$query = "
    SELECT ward, MIN(ward_tot) AS total 
    FROM dashboard_summary_ward 
    GROUP BY ward 
    ORDER BY ward";
$result = mysqli_query($conn, $query);

// Store fetched data in an array
$wards = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $wards[] = $row;
    }
}

mysqli_close($conn);
?>
