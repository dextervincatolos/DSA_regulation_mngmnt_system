<?php

include('../sessions.php');

if (isset($_POST['save_policy'])) {
    $policyID = $_POST['policyID'];
    $policyTitle = $_POST['policy_title'];
    $policyDescription = $_POST['policy_description'];
    $policySanctions = $_POST['policy_sanction'];

    // Update policy details
    $updatePolicyQuery = "UPDATE schoolpolicy_tbl SET policy_title = ?, policy_desc = ? WHERE spID = ?";
    $stmt = $connection->prepare($updatePolicyQuery);
    $stmt->bind_param("ssi", $policyTitle, $policyDescription, $policyID);
    $stmt->execute();

    // Get existing sanctions for the policy
    $getExistingSanctionsQuery = "SELECT sanctionID, sanction FROM sanction_tbl WHERE spID = ?";
    $stmt = $connection->prepare($getExistingSanctionsQuery);
    $stmt->bind_param("i", $policyID);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingSanctions = [];
    while ($row = $result->fetch_assoc()) {
        $existingSanctions[$row['sanctionID']] = $row['sanction'];
    }

    // Insert or update sanctions
    foreach ($policySanctions as $sanctionID => $sanction) {
        if (array_key_exists($sanctionID, $existingSanctions)) {
            // Update existing sanction
            $updateSanctionQuery = "UPDATE sanction_tbl SET sanction = ? WHERE sanctionID = ? AND spID = ?";
            $stmt = $connection->prepare($updateSanctionQuery);
            $stmt->bind_param("sii", $sanction, $sanctionID, $policyID);
        } else {
            // Insert new sanction
            $insertSanctionQuery = "INSERT INTO sanction_tbl (spID, sanction) VALUES (?, ?)";
            $stmt = $connection->prepare($insertSanctionQuery);
            $stmt->bind_param("is", $policyID, $sanction);
        }
        $stmt->execute();
    }

    $_SESSION['status'] = "Updated successfully!";
    $_SESSION['status_code'] = "info";
    header("Location: ../policy.php");
    exit();
}
?>
