<?php

$sublocation = isset($_GET['sublocation']) ? $_GET['sublocation'] : '';

// Get the current page number from the request, default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$rowsPerPage = 6; // Number of rows per page
$offset = ($page - 1) * $rowsPerPage;

// Fetch data from the database based on the sublocation and limit
$sql = "SELECT name, adm_no, education_level, class, school 
        FROM test_data_teso 
        WHERE sublocation = ? 
        LIMIT $rowsPerPage OFFSET $offset";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $sublocation);
$stmt->execute();
$result = $stmt->get_result();

// Fetch rows as an array
$students = $result->fetch_all(MYSQLI_ASSOC);

// Get total number of students in the sublocation for pagination
$sqlTotal = "SELECT COUNT(*) as total FROM test_data_teso WHERE sublocation = ?";
$stmtTotal = $conn->prepare($sqlTotal);
$stmtTotal->bind_param('s', $sublocation);
$stmtTotal->execute();
$resultTotal = $stmtTotal->get_result();
$totalRows = $resultTotal->fetch_assoc()['total'];

$totalPages = ceil($totalRows / $rowsPerPage);
?>