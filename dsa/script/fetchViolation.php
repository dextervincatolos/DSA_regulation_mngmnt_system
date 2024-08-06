<?php
include('../sessions.php');

$violationsQuery = "SELECT schoolpolicy_tbl.*,violation_tbl.violation_status, COUNT(*) as count 
                    FROM violation_tbl
                    JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID 
                    GROUP BY violation_tbl.spID, violation_tbl.violation_status";
$violationsResult = $connection->query($violationsQuery);

$violations = [];
while ($row = $violationsResult->fetch_assoc()) {
    $violations[] = $row;
}

$departmentPolicyViolationsQuery = "SELECT department_tbl.*, schoolpolicy_tbl.*, COUNT(violation_tbl.violationID) as count
    FROM violation_tbl
    JOIN student_tbl ON violation_tbl.studID = student_tbl.studID
    JOIN department_tbl ON student_tbl.college = department_tbl.deptID
    JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID
    GROUP BY department_tbl.dept_name, schoolpolicy_tbl.spID";

 $departmentViolationsResult = $connection->query($departmentPolicyViolationsQuery);

$departmentViolations = [];
while ($row = $departmentViolationsResult->fetch_assoc()) {
    $departmentViolations[] = $row;
}

// Return data as JSON
echo json_encode([
    'violations' => $violations,
    'departmentViolations' => $departmentViolations
]);
?>
