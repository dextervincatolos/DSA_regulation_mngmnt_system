<?php
include('../sessions.php');

if (!isset($_GET['id'])) {
    echo json_encode([
        'error' => 'No student ID provided'
    ]);
    exit;
}

$uid =$_GET['id'];
$violationsQuery = "SELECT schoolpolicy_tbl.*,violation_tbl.violation_status, COUNT(*) as count 
                    FROM violation_tbl
                    JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID 
                    WHERE violation_tbl.studID =$uid
                    GROUP BY violation_tbl.spID, violation_tbl.violation_status";
$violationsResult = $connection->query($violationsQuery);

$violations = [];
while ($row = $violationsResult->fetch_assoc()) {
    $violations[] = $row;
}

// Return data as JSON
echo json_encode([
    'violations' => $violations
]);
?>
