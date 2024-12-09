<?php
include('../sessions.php');

$deptID =$_SESSION['department'];
$violationsQuery = "SELECT schoolpolicy_tbl.*,violation_tbl.violation_status, student_tbl.college, COUNT(*) as count 
                    FROM violation_tbl
                    JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
                    JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID 
                    WHERE student_tbl.college = $deptID
                    GROUP BY violation_tbl.spID, violation_tbl.violation_status";
$violationsResult = $connection->query($violationsQuery);

$violations = [];
while ($row = $violationsResult->fetch_assoc()) {
    $violations[] = $row;
}

$departmentPolicyViolationsQuery = "SELECT course_tbl.*, schoolpolicy_tbl.*, COUNT(violation_tbl.violationID) as count
    FROM violation_tbl
    JOIN student_tbl ON violation_tbl.studID = student_tbl.studID
    JOIN course_tbl ON student_tbl.courseID = course_tbl.courseID
    JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID
    WHERE student_tbl.college = $deptID
    GROUP BY course_tbl.course_name, schoolpolicy_tbl.spID";

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
