<?php
include('../sessions.php');

$policyID = intval($_GET['policyID']);

$getSanctions = "SELECT * FROM sanction_tbl WHERE spID = ".$policyID;
$policySanctions = $connection->query($getSanctions);

$sanctions = array();
while ($row = $policySanctions->fetch_assoc()) {
    $sanctions[] = $row;
}

echo json_encode(['sanctions' => $sanctions]);
?>
