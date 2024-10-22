<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../connection/conn.php');

if (isset($_POST['old_school_name']) && isset($_POST['new_school_name'])) {
    $oldSchoolName = $_POST['old_school_name'];
    $newSchoolName = $_POST['new_school_name'];

    $stmt = $conn->prepare("UPDATE test_data_teso SET school = ? WHERE school = ?");
    $stmt->bind_param('ss', $newSchoolName, $oldSchoolName);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'School name updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update school name.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
