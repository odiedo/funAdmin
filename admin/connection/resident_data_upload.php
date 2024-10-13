<?php
include('conn.php');
if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
    // Get the uploaded file information
    $fileTmpPath = $_FILES['csv_file']['tmp_name'];
    $fileName = $_FILES['csv_file']['name'];
    $fileSize = $_FILES['csv_file']['size'];
    $fileType = $_FILES['csv_file']['type'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Check if it's a valid CSV file
    if ($fileExtension === 'csv') {
        // Open the file for reading
        if (($handle = fopen($fileTmpPath, 'r')) !== FALSE) {
            // Skip the first row (header row)
            fgetcsv($handle);

            // Loop through the CSV file and merge data
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $full_name = htmlspecialchars($data[0]);
                $phone = htmlspecialchars($data[1]);
                $ward = htmlspecialchars($data[2]);
                $location = htmlspecialchars($data[3]);
                $sublocation = htmlspecialchars($data[4]);
                $status = htmlspecialchars($data[5]);

                // Check if the resident already exists in the database by phone number
                $query = $conn->prepare("SELECT * FROM residents WHERE phone = ?");
                $query->bind_param("s", $phone);
                $query->execute();
                $result = $query->get_result();

                if ($result->num_rows > 0) {
                    // If the resident exists, update their record
                    $updateQuery = $conn->prepare("UPDATE residents SET full_name = ?, ward = ?, location = ?, sublocation = ?, status = ? WHERE phone = ?");
                    $updateQuery->bind_param("ssssss", $full_name, $ward, $location, $sublocation, $status, $phone);
                    $updateQuery->execute();
                } else {
                    // If the resident does not exist, insert a new record
                    $insertQuery = $conn->prepare("INSERT INTO residents (full_name, phone, ward, location, sublocation, status) VALUES (?, ?, ?, ?, ?, ?)");
                    $insertQuery->bind_param("ssssss", $full_name, $phone, $ward, $location, $sublocation, $status);
                    $insertQuery->execute();
                }
            }

            fclose($handle);
            echo "Data uploaded and merged successfully!";
        } else {
            echo "Error opening the file.";
        }
    } else {
        echo "Please upload a valid CSV file.";
    }
} else {
    echo "File upload error. Please try again.";
}
?>
