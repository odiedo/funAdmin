<?php

header('Content-Type: application/json');
session_start();

include 'conn.php';

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['email'], $data['password'])) {
    echo json_encode(['success' => false, 'message' => 'Email and password are required']);
    exit();
}

$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$password = $data['password'];

$sql = "SELECT clerk_id, fullname, password FROM clerks WHERE email=? AND status='active'";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Something went wrong']);
    exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];
    $userId = $row['clerk_id'];
    $fullname = $row['fullname'];

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['user_id'] = $userId;
        $_SESSION['email'] = $email;
        $_SESSION['fullname'] = $fullname;

        $accessToken = bin2hex(random_bytes(16));

        echo json_encode([
            'success' => true,
            'message' => 'Logged in successfully',
            // Send access token back to the client
            'access_token' => $accessToken,
            'fullname' => $fullname 

        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}

$stmt->close();
$conn->close();
?>
