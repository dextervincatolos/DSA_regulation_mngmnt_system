<?php
include('../sessions.php');

$mostViolatedQuery = "SELECT schoolpolicy_tbl.spID, schoolpolicy_tbl.policy_code, COUNT(*) as violation_count
    FROM violation_tbl
    JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID
    GROUP BY violation_tbl.spID
    ORDER BY violation_count DESC"; 
    // Optional: Add LIMIT to get top 10 most violated policies
$mostViolatedResult = $connection->query($mostViolatedQuery);

$mostViolatedPolicies = [];
while ($row = $mostViolatedResult->fetch_assoc()) {
    $mostViolatedPolicies[] = $row;
}


// Return data as JSON
echo json_encode($mostViolatedPolicies);
?>
