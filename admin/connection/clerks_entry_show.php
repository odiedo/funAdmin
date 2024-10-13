<?php
include 'conn.php';

$query = "SELECT clerk_id, fullname, tot_entries, status FROM clerks LIMIT 5";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Fetch each row and display in the table
    while ($row = $result->fetch_assoc()) {
        $clerk_id = $row['clerk_id'];
        $fullname = $row['fullname'];
        $tot_entries = $row['tot_entries'];
        // Capitalize the first letter of the status
        $status = ucfirst($row['status']); 

        // Generate entryno by combining the first 3 letters of fullname and the clerk_id
        $entryno = strtolower(substr($fullname, 0, 3)) . $clerk_id;

        echo "
        <tr>
            <td><input class='form-check-input' type='checkbox'></td>
            <td>$entryno</td>
            <td>$fullname</td>
            <td>$tot_entries</td>
            <td>$status</td>
            <td><a class='btn btn-sm btn-primary' href=''>Detail</a></td>
        </tr>";
    }
} else {
    // No data found message
    echo "<tr><td colspan='6' class='text-center'>No clerks found</td></tr>";
}
?>
