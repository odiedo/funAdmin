<?php
include('conn.php');

// First, fetch all wards, locations, and sublocations from the `wards` table
$query = "SELECT ward_name, location_name, sublocation_name FROM wards";
$result = mysqli_query($conn, $query);

if ($result) {
    // Loop through each row in the wards table
    while ($row = mysqli_fetch_assoc($result)) {
        $ward = $row['ward_name'];
        $location = $row['location_name'];
        $sublocation = $row['sublocation_name'];

        // Count total applicants for each ward
        $ward_query = "SELECT COUNT(*) as ward_total FROM test_data_teso WHERE ward = '$ward'";
        $ward_result = mysqli_query($conn, $ward_query);
        $ward_total = mysqli_fetch_assoc($ward_result)['ward_total'];

        // Count total applicants for each location
        $location_query = "SELECT COUNT(*) as location_total FROM test_data_teso WHERE ward = '$ward' AND location = '$location'";
        $location_result = mysqli_query($conn, $location_query);
        $location_total = mysqli_fetch_assoc($location_result)['location_total'];

        // Count total applicants for each sublocation
        $sublocation_query = "SELECT COUNT(*) as sublocation_total FROM test_data_teso WHERE ward = '$ward' AND location = '$location' AND sublocation = '$sublocation'";
        $sublocation_result = mysqli_query($conn, $sublocation_query);
        $sublocation_total = mysqli_fetch_assoc($sublocation_result)['sublocation_total'];

        // Check if the ward, location, and sublocation data already exists in the dashboard summary table
        $check_query = "SELECT * FROM dashboard_summary_ward WHERE ward = '$ward' AND location = '$location' AND sublocation = '$sublocation'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            // If entry exists, update the existing record
            $update_query = "UPDATE dashboard_summary_ward SET ward_tot = $ward_total, location_tot = $location_total, sublocation_tot = $sublocation_total
                             WHERE ward = '$ward' AND location = '$location' AND sublocation = '$sublocation'";
            mysqli_query($conn, $update_query);
        } else {
            // If no entry exists, insert a new record
            $insert_query = "INSERT INTO dashboard_summary_ward (ward, ward_tot, location, location_tot, sublocation, sublocation_tot)
                             VALUES ('$ward', $ward_total, '$location', $location_total, '$sublocation', $sublocation_total)";
            mysqli_query($conn, $insert_query);
        }
    }

    echo "Dashboard summary updated successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
