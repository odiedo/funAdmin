<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../connection/conn.php');

// Find wards in test_data_teso that are not in wards
$query = "SELECT DISTINCT t.ward, t.location, t.subLocation 
          FROM test_data_teso t
          LEFT JOIN wards w ON t.ward = w.ward_name
          WHERE w.ward_name IS NULL";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ward_name = $row['ward'];
        $location_name = $row['location'];
        $sublocation_name = $row['subLocation'];

        // Check if the ward already exists in the other_wards table
        $check_query = "SELECT * FROM other_wards WHERE ward_name = '$ward_name'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows == 0) {
            $insert_query = "INSERT INTO other_wards (ward_name, location_name, sublocation_name) 
                             VALUES ('$ward_name', '$location_name', '$sublocation_name')";

            if ($conn->query($insert_query) === TRUE) {
                echo "Successfuly identified other Wards: $ward_name";
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        } else {
            // Ward already exists
            echo "Ward $ward_name already exists in other_wards.";
        }
    }
} else {
    echo "No new wards found to add.";
}

$conn->close();
?>
