<?php
// Include your database connection file
include('../sessions.php');

// Get the collegeID from the query string
$collegeID = intval($_GET['collegeID']);

// Fetch courses for the selected college
$getCourses = "SELECT * FROM course_tbl WHERE deptID =".$collegeID;
$offeredCourses = $connection->query($getCourses);

$courses = array();
while ($row = $offeredCourses->fetch_assoc()) {
    $courses[] = $row;
}

// Return the courses as JSON
echo json_encode($courses);

?>
