<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../connection/conn.php');

// Fetch data from other_wards
$query = "SELECT ward_name, location_name, sublocation_name FROM other_wards";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ward_name = $row['ward_name'];
        $location_name = $row['location_name'];
        $sublocation_name = $row['sublocation_name'];

        // Count occurrences in teso_test_data
        $ward_count_query = "SELECT COUNT(*) AS ward_tot FROM test_data_teso WHERE ward = '$ward_name'";
        $location_count_query = "SELECT COUNT(*) AS location_tot FROM test_data_teso WHERE location = '$location_name'";
        $sublocation_count_query = "SELECT COUNT(*) AS sublocation_tot FROM test_data_teso WHERE subLocation = '$sublocation_name'";

        $ward_count_result = $conn->query($ward_count_query)->fetch_assoc()['ward_tot'];
        $location_count_result = $conn->query($location_count_query)->fetch_assoc()['location_tot'];
        $sublocation_count_result = $conn->query($sublocation_count_query)->fetch_assoc()['sublocation_tot'];

        // Check if the ward already exists in dashboard_summary_other_ward
        $check_query = "SELECT * FROM dashboard_summary_other_ward WHERE ward = '$ward_name'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            // Update existing record
            $update_query = "UPDATE dashboard_summary_other_ward 
                             SET ward_tot = '$ward_count_result', location_tot = '$location_count_result', sublocation_tot = '$sublocation_count_result' 
                             WHERE ward = '$ward_name'";
                             
            if ($conn->query($update_query) === TRUE) {
                echo "Updated record for ward: $ward_name<br>";
            } else {
                echo "Error updating record for ward: $ward_name<br>" . $conn->error;
            }
        } else {
            // Insert new record
            $insert_query = "INSERT INTO dashboard_summary_other_ward (ward, ward_tot, location, location_tot, sublocation, sublocation_tot) 
                             VALUES ('$ward_name', '$ward_count_result', '$location_name', '$location_count_result', '$sublocation_name', '$sublocation_count_result')";

            if ($conn->query($insert_query) === TRUE) {
                echo "Wards added successfully";
            } else {
                echo "Error adding other wards: $ward_name" . $conn->error;
            }
        }
    }
} else {
    echo "No data found in other_wards.";
}

$conn->close();
?>
