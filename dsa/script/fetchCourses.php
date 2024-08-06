<?php
include('../sessions.php');

$collegeID = intval($_GET['collegeID']);

$getCourses = "SELECT * FROM course_tbl WHERE deptID =".$collegeID;
$offeredCourses = $connection->query($getCourses);

$courses = array();
while ($row = $offeredCourses->fetch_assoc()) {
    $courses[] = $row;
}

echo json_encode($courses);

?>
