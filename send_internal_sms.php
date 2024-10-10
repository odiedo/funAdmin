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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_internal'])) {
    // Get form inputs
    $target = $_POST['target'];
    $message = $_POST['message'];

    // Fetch staff based on the selected target group
    if ($target === 'all-employees') {
        $sql = "SELECT phone, office, employee_post FROM staff WHERE status='active'";
    } else {
        // Match target to employee_post or office
        $sql = "SELECT phone, office, employee_post FROM staff WHERE employee_post='$target' OR office='$target' AND status='active'";
    }

    $result = $conn->query($sql);

    // API details
    $apikey = '272becc7d9e0ed5186425b3a65be2058';
    $partnerID = 6999;
    $shortcode = 'TextSMS';
    $bulkUrl = 'https://sms.textsms.co.ke/api/services/sendbulk/';

    $smsList = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $smsList[] = array(
                'partnerID' => $partnerID,
                'apikey' => $apikey,
                'mobile' => $row['phone'],
                'message' => urldecode(urlencode($message)),
                'shortcode' => $shortcode,
                'pass_type' => 'plain'
            );

            // Save SMS details to recent_internal_sms table
            $stmt = $conn->prepare("INSERT INTO recent_internal_sms (target, message) VALUES (?, ?)");
            $stmt->bind_param("ss", $target, $message);
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
        echo "<script>alert('Internal SMS sent successfully!'); window.location.href='bulk.php';</script>";
    } else {
        echo "<script>alert('Failed to send Internal SMS');</script>";
    }
}

$conn->close();
?>
