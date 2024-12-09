<?php
include('../../sessions.php');

$uid = $_SESSION['uid'];
$deptID =$_SESSION['department'];
$getNotif ="SELECT notification_tbl.*, department_tbl.*, violation_tbl.studID, violation_tbl.spID, violation_tbl.sanctionID, violation_tbl.violation_status, violation_tbl.violation_added_by,violation_tbl.created_at, violation_tbl.updated_at,
            student_tbl.student_fname, student_tbl.student_lname, student_tbl.student_mname,student_tbl.student_extname,
            schoolpolicy_tbl.policy_title, schoolpolicy_tbl.policy_type, sanction_tbl.sanction,user_tbl.faculty_fname, user_tbl.faculty_mname, user_tbl.faculty_lname, user_tbl.faculty_extname
            FROM notification_tbl
            JOIN violation_tbl ON notification_tbl.violationID = violation_tbl.violationID
            JOIN department_tbl ON notification_tbl.deptID = department_tbl.deptID
            JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID
            JOIN sanction_tbl ON violation_tbl.sanctionID = sanction_tbl.sanctionID
            JOIN student_tbl ON violation_tbl.studID = student_tbl.studID
            JOIN user_tbl ON notification_tbl.userID = user_tbl.userID
            WHERE notification_tbl.deptID = $deptID AND notification_tbl.notif_Status = 0 AND notification_tbl.userID = $uid
            ORDER BY notification_tbl.created_at DESC
            LIMIT 10";
          
$stmt = $connection->prepare($getNotif);
$stmt->execute();
$result = $stmt->get_result();


$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Fetch Prefect of Discipline details
$prefectQuery = "SELECT faculty_fname, faculty_mname, faculty_lname, faculty_extname FROM user_tbl WHERE faculty_role = 'DSA-Admin' LIMIT 1";
$prefectResult = $connection->query($prefectQuery);

$prefect = [];
if ($prefectResult->num_rows > 0) {
    $prefect = $prefectResult->fetch_assoc();
}

// Add Prefect of Discipline details to the response
$response = [
    'data' => $data,
    'prefect' => $prefect,
];

// Return data as JSON
echo json_encode($response);
$connection->close();

?>