<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch total applications, PWDs, partial orphans, total orphans, single parents
    $queryTotal = "SELECT COUNT(*) as total_app FROM test_data_teso";
    $queryPwds = "SELECT COUNT(*) as pwds FROM test_data_teso WHERE disability = 'yes'";
    $queryPartialOrphans = "SELECT COUNT(*) as partial_orphans FROM test_data_teso WHERE orphan = 'partial orphan'";
    $queryTotalOrphans = "SELECT COUNT(*) as total_orphans FROM test_data_teso WHERE orphan = 'total orphan'";
    $querySingleParents = "SELECT COUNT(*) as single_parents FROM test_data_teso WHERE m_dead_alive = 'alive' AND dead_alive = 'dead'";

    // Get the totals
    $resultTotal = $conn->query($queryTotal);
    $resultPwds = $conn->query($queryPwds);
    $resultPartialOrphans = $conn->query($queryPartialOrphans);
    $resultTotalOrphans = $conn->query($queryTotalOrphans);
    $resultSingleParents = $conn->query($querySingleParents);

    // Fetch the result arrays
    $totalApp = $resultTotal->fetch_assoc()['total_app'];
    $pwds = $resultPwds->fetch_assoc()['pwds'];
    $partialOrphans = $resultPartialOrphans->fetch_assoc()['partial_orphans'];
    $totalOrphans = $resultTotalOrphans->fetch_assoc()['total_orphans'];
    $singleParents = $resultSingleParents->fetch_assoc()['single_parents'];

    // Calculate the "others" category
    $others = $totalApp - ($pwds + $partialOrphans + $totalOrphans + $singleParents);

    // Check if there is already an entry in dashboard_summary_one
    $checkQuery = "SELECT * FROM dashboard_summary_one LIMIT 1";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // If record exists, update it
        $updateQuery = "UPDATE dashboard_summary_one 
                        SET total_app = ?, pwds = ?, partial_orphans = ?, total_orphans = ?, single_parents = ?, others = ?
                        WHERE dash_sum_one_id = 1";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("iiiiii", $totalApp, $pwds, $partialOrphans, $totalOrphans, $singleParents, $others);
        $stmt->execute();
        echo "Dashboard summary updated successfully.";
    } else {
        // If no record exists, insert a new one
        $insertQuery = "INSERT INTO dashboard_summary_one (total_app, pwds, partial_orphans, total_orphans, single_parents, others) 
                        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("iiiiii", $totalApp, $pwds, $partialOrphans, $totalOrphans, $singleParents, $others);
        $stmt->execute();
        echo "Dashboard summary created successfully.";
    }

    $stmt->close();
    $conn->close();
}
?>
