<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection
include('../connection/conn.php');

// Query to group schools and count students
$query = "SELECT school, COUNT(*) AS student_count FROM test_data_teso GROUP BY school ORDER BY school ASC LIMIT 10";
$result = $conn->query($query);

// Check if there are any results
if ($result->num_rows > 0) {
    $schools = [];
    while ($row = $result->fetch_assoc()) {
        $schools[] = [
            'school' => $row['school'],
            'student_count' => $row['student_count']
        ];
    }
    echo json_encode(['status' => 'success', 'data' => $schools]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No data found']);
}

// Close the database connection
$conn->close();
?>
