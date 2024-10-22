<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Start output buffering to avoid unexpected output
ob_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bulk_sms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    // Flush the output buffer
    ob_end_flush();
    exit();
}

// Get JSON data from POST request
$json = file_get_contents("php://input");

if ($json === false || empty($json)) {
    echo json_encode(["success" => false, "message" => "No input received"]);
    // Flush the output buffer
    ob_end_flush();
    exit();
}

$data = json_decode($json, true);

// Validate JSON decoding
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["success" => false, "message" => "Invalid JSON format"]);
    // Flush the output buffer
    ob_end_flush();
    exit();
}

// Validate required fields
$required_fields = ['studentName', 'gender', 'dob', 'birthCertNo', 'year_of_admission', 'course_duration', 'expected_completion', 'educationLevel', 'email'];

foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        echo json_encode(["success" => false, "message" => "Field '$field' is required."]);
        // Flush the output buffer
        ob_end_flush();
        exit();
    }
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("
    INSERT INTO students 
    (student_name, adm_no, gender, dob, birth_cert_no, phone_number, form_class, school, 
    year_of_admission, course_duration, expected_completion, education_level, fee_balance, 
    father_name, father_id, father_status, father_occupation, mother_name, mother_id, mother_status, 
    mother_occupation, ward, location, sub_location, disability_status, orphan_status, email) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    echo json_encode(["success" => false, "message" => "SQL error: " . $conn->error]);
    // Flush the output buffer
    ob_end_flush();
    exit();
}

$stmt->bind_param(
    "sssssssssiissssssssssssss",
    $data['studentName'], $data['admNo'], $data['gender'], $data['dob'], $data['birthCertNo'], 
    $data['phoneNumber'], $data['formClass'], $data['school'], $data['year_of_admission'], 
    $data['course_duration'], $data['expected_completion'], $data['educationLevel'], $data['feeBalance'], 
    $data['fatherName'], $data['fatherId'], $data['fatherStatus'], $data['occupation'], 
    $data['motherName'], $data['motherId'], $data['motherStatus'], $data['mOccupation'], 
    $data['ward'], $data['location'], $data['subLocation'], $data['disability'], $data['orphan'], 
    $data['email']
);

// Execute statement and return response
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Student data submitted successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

// Flush the output buffer to ensure clean output
ob_end_flush();

// Close connection
$stmt->close();
$conn->close();
?>
