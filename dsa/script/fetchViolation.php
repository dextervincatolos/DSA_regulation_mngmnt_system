<?php
include('../sessions.php');

// Fetch total number of violations committed (all time)
// $violationsQuery = "SELECT schoolpolicy_tbl.*, COUNT(*) as count FROM violation_tbl JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID GROUP BY violation_tbl.spID";
// $violationsResult = $connection->query($violationsQuery);
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


// $departmentViolationsQuery = "SELECT department_tbl.*, COUNT(violation_tbl.violationID) as count
//     FROM violation_tbl
//     JOIN student_tbl ON violation_tbl.studID = student_tbl.studID
//     JOIN department_tbl ON student_tbl.college = department_tbl.deptID
//     GROUP BY department_tbl.dept_name";
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
