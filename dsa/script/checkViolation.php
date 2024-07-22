<?php
include('../sessions.php');

// Ensure that errors and warnings are not output directly to the browser
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Set header to return JSON response
header('Content-Type: application/json');

// Initialize response array
$response = [
    'exists' => false,
    'sanctions' => '',
    'error' => ''
];

try {
    // Get parameters from query string
    $policyID = intval($_GET['policyID']);
    $studentID = intval($_GET['studentID']);
    $semesterID = intval($_GET['semesterID']);
    $sy = $connection->real_escape_string($_GET['sy']);

    if (!$policyID || !$studentID || !$semesterID || !$sy) {
        throw new Exception("Invalid parameters.");
    }

    // Check for existing violations
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

    // Update response
    $response['exists'] = $exists;
    $response['sanctions'] = implode(', ', $sanctions);

} catch (Exception $e) {
    // Handle any errors
    $response['error'] = $e->getMessage();
}

// Output the response as JSON
echo json_encode($response);
?>
