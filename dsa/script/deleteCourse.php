<?php
include('../sessions.php');

// Check if the `id` parameter is set in the URL
if (isset($_GET['id'])) {

    // Get the Course ID from the URL
    $courseID = intval($_GET['id']);

    $fetchQ = mysqli_query($connection,"SELECT course_desc FROM course_tbl WHERE courseID =". $courseID);
    $row = mysqli_fetch_assoc($fetchQ);

    $course_desc = $row['course_desc'];

    // Prepare and execute the deletion query
    $query = "DELETE FROM course_tbl WHERE courseID = $courseID";
    $query_run = mysqli_query($connection, $query);
   

    if ($query_run) {

        $uid = $_SESSION['uid'];
        mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Deleted course ($course_desc)...','successful') ");


        $_SESSION['status'] = "Course Information Deleted successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../manage_course.php');
      
    } else {
        $_SESSION['status'] = "Something went wrong. Please try again";
        $_SESSION['status_code'] = "error";
        header('Location: ../manage_course.php');
    }
} else {
    $_SESSION['status'] = "Course Not Found!";
    $_SESSION['status_code'] = "error";
    header('Location: ../manage_course.php');
}

?>
