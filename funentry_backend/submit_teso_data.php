<?php
// Turn off output buffering and output PHP errors to logs instead of directly in response
ini_set('output_buffering', 0);
ini_set('display_errors', 0); // Ensure errors are logged, not displayed

// Log errors to a file to avoid interfering with JSON output
ini_set('log_errors', 1);
ini_set('error_log', '/funentry_backend/php-error.log'); // Update this path for your server

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Start session
session_start();

// Ensure no unwanted output before JSON response
ob_start(); // Start output buffering

// Check if a session exists
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Unauthorized access. Please log in.']);
    exit();
}

// Include database connection
include 'conn.php';

// Check for database connection error
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Retrieve and decode JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate JSON input
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON input']);
    exit();
}

// Check for required fields
$required_fields = [
    'email', 'studentName', 'gender', 'dob', 'birthCertNo', 'phoneNumber', 
    'formClass', 'school', 'admNo', 'year_of_admission', 'course_duration', 
    'expected_completion', 'educationLevel', 'feeBalance', 'fatherName', 
    'fatherId', 'fatherStatus', 'occupation', 'motherName', 'motherId', 
    'phoneNumber', 'motherStatus', 'mOccupation', 'ward', 'location', 
    'subLocation', 'disability', 'orphan'
];

foreach ($required_fields as $field) {
    if (!isset($data[$field])) {
        echo json_encode(['error' => "Missing required field: $field"]);
        exit();
    }
}

// Assign values with proper sanitation
$app_id = rand(10000, 99999);
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$name = htmlspecialchars($data['studentName']);
$gender = htmlspecialchars($data['gender']);
$dob = $data['dob'];
$birth_cert_no = (int)$data['birthCertNo'];
$phone = (int)$data['phoneNumber'];
$class = (int)$data['formClass'];
$school = htmlspecialchars($data['school']);
$adm_no = htmlspecialchars($data['admNo']);
$year_of_admission = (int)$data['year_of_admission'];
$course_duration = (int)$data['course_duration'];
$expected_completion = (int)$data['expected_completion'];
$education_level = htmlspecialchars($data['educationLevel']);
$fee_balance = (float)$data['feeBalance'];
$fname = htmlspecialchars($data['fatherName']);
$id_number = (int)$data['fatherId'];
$dead_alive = htmlspecialchars($data['fatherStatus']);
$occupation = htmlspecialchars($data['occupation']);
$mname = htmlspecialchars($data['motherName']);
$m_id_number = (int)$data['motherId'];
$m_phone = (int)$data['phoneNumber'];
$m_dead_alive = htmlspecialchars($data['motherStatus']);
$m_occupation = htmlspecialchars($data['mOccupation']);
$ward = htmlspecialchars($data['ward']);
$location = htmlspecialchars($data['location']);
$subLocation = htmlspecialchars($data['subLocation']);
$disability = htmlspecialchars($data['disability']);
$orphan = htmlspecialchars($data['orphan']);
$terms = 'yes';
$declaration = 'yes';
$process_status = 'complete';
$status = 'pending';

// SQL Insert query
$sql = "INSERT INTO test_data_teso (
    app_id, email, name, gender, dob, birth_cert_no, phone, class, school, adm_no, 
    year_of_admission, course_duration, expected_completion, education_level, fee_balance, 
    fname, id_number, dead_alive, occupation, mname, m_id_number, m_phone, m_dead_alive, 
    m_occupation, ward, location, subLocation, disability, orphan, terms, declaration, 
    process_status, status
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare statement
if ($stmt = $conn->prepare($sql)) {
    // Bind parameters to the SQL query
    $stmt->bind_param(
        "issssssisssssssssssssssssssssss",
        $app_id, $email, $name, $gender, $dob, $birth_cert_no, $phone, $class, $school, 
        $adm_no, $year_of_admission, $course_duration, $expected_completion, $education_level, 
        $fee_balance, $fname, $id_number, $dead_alive, $occupation, $mname, $m_id_number, 
        $m_phone, $m_dead_alive, $m_occupation, $ward, $location, $subLocation, $disability, 
        $orphan, $terms, $declaration, $process_status, $status
    );

    // Execute the statement and handle the response
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Data submitted successfully!']);
    } else {
        echo json_encode(['error' => 'Failed to submit data: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['error' => 'Failed to prepare SQL statement: ' . $conn->error]);
}

ob_end_clean(); // Clear output buffer

// Close the database connection
$conn->close();
?>
