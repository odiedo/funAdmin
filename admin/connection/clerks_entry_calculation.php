<?php
include('conn.php');
// Fetch all clerks
$query = "SELECT email FROM clerks";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Iterate through each clerk
    while ($row = $result->fetch_assoc()) {
        $clerk_email = $row['email'];
        
        // Count entries in test_data_teso by the clerk's email
        $countQuery = $conn->prepare("SELECT COUNT(*) as total_entries FROM test_data_teso WHERE email = ?");
        $countQuery->bind_param('s', $clerk_email);
        $countQuery->execute();
        $countResult = $countQuery->get_result();
        $countRow = $countResult->fetch_assoc();
        $total_entries = $countRow['total_entries'];

        // Update the clerks table with the total entries count
        $updateQuery = $conn->prepare("UPDATE clerks SET tot_entries = ? WHERE email = ?");
        $updateQuery->bind_param('is', $total_entries, $clerk_email);
        $updateQuery->execute();
    }
    
    echo json_encode(["status" => "success", "message" => "Total entries updated for all clerks."]);
} else {
    echo json_encode(["status" => "error", "message" => "No clerks found."]);
}
?>
