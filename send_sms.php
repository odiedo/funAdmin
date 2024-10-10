<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bulk_sms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ward = $_POST['ward'];
$message = $_POST['message'];

// Fetch all active residents for the selected ward
$sql = "SELECT phone, ward, location, sublocation FROM residents WHERE ward='$ward' AND status = 'active'";
$result = $conn->query($sql);

// API details
$apikey = '272becc7d9e0ed5186425b3a65be2058';
$partnerID = 6999;
$encodedMessage = urlencode($message);
$shortcode = 'TextSMS';
$bulkUrl = 'https://sms.textsms.co.ke/api/services/sendbulk/';

$smsList = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $smsList[] = array(
            'partnerID' => $partnerID,
            'apikey' => $apikey,
            'mobile' => $row['phone'],
            'message' => urldecode($encodedMessage),
            'shortcode' => $shortcode,
            'pass_type' => 'plain'
        );

        // Save SMS details to recent_sms table
        $ward = $row['ward'];
        $location = $row['location'];
        $sublocation = $row['sublocation'];
        $stmt = $conn->prepare("INSERT INTO recent_sms (ward, location, sublocation, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $ward, $location, $sublocation, $message);
        $stmt->execute();
    }
}

// Prepare data for bulk SMS API
$data = json_encode(array('count' => count($smsList), 'smslist' => $smsList));

// cURL for POST request
$ch = curl_init($bulkUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Execute the request
$response = curl_exec($ch);
curl_close($ch);

// Handle the response
$responseData = json_decode($response, true);
if ($responseData) {
    echo "<script>alert('Bulk SMS sent successfully'); window.location.href='bulk.php';</script>";
} else {
    echo "<script>alert('Failed to send Bulk SMS');</script>";
}

$conn->close();
?>