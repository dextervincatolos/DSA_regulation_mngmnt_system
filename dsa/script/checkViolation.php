<?php
include('../sessions.php');

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json');

$response = [
    'exists' => false,
    'sanctions' => '',
    'error' => ''
];

try {
    $policyID = intval($_GET['policyID']);
    $studentID = intval($_GET['studentID']);
    $semesterID = intval($_GET['semesterID']);
    $sy = $connection->real_escape_string($_GET['sy']);

    if (!$policyID || !$studentID || !$semesterID || !$sy) {
        throw new Exception("Invalid parameters.");
    }

    $getViolations = "SELECT sanction_tbl.sanction FROM violation_tbl JOIN sanction_tbl ON violation_tbl.sanctionID=sanction_tbl.sanctionID WHERE violation_tbl.spID = $policyID AND violation_tbl.studID = $studentID AND violation_tbl.semID = $semesterID AND violation_tbl.acadsyrID = '$sy'";
    $result = $connection->query($getViolations);

    if ($result === false) {
        throw new Exception("Database Query Failed: " . $connection->error);
    }

    $exists = $result->num_rows > 0;
    $sanctions = [];

    if ($exists) {
        while ($row = $result->fetch_assoc()) {
            $sanctions[] = $row['sanction'];
        }
    }

    $response['exists'] = $exists;
    $response['sanctions'] = implode(', ', $sanctions);

} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
?>
