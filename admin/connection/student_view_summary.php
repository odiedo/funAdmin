<?php

if (isset($_GET['adm_no']) && isset($_GET['name']) && isset($_GET['school']) && isset($_GET['education_level']) && isset($_GET['class'])) {
    $adm_no = htmlspecialchars($_GET['adm_no']);
    $name = htmlspecialchars($_GET['name']);
    $education_level = htmlspecialchars($_GET['education_level']);
    $class = htmlspecialchars($_GET['class']);
    $school = htmlspecialchars($_GET['school']);

    $query = $conn->prepare("SELECT * FROM test_data_teso WHERE adm_no = ? AND name = ? AND school = ? AND education_level = ? AND class = ?");
    $query->bind_param("sssss", $adm_no, $name, $school, $education_level, $class);
    $query->execute();

    $result = $query->get_result();
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "No student found.";
        exit;
    }
} else {
    echo "No student specified.";
    exit;
}
?>
