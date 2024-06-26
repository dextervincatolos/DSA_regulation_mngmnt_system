<?php

include('../sessions.php');

if (isset($_POST['update'])) {

    // Retrieve form data
    $courseID = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_desc = $_POST['course_desc'];
    $dept_name = $_POST['dept_name'];


    $checkRecord = mysqli_query($connection, "SELECT * FROM course_tbl WHERE courseID='$courseID' ");
    $row = mysqli_fetch_assoc($checkRecord);

    if ($row['course_name'] == $course_name AND $row['course_desc'] == $course_desc AND $row['deptID'] == $dept_name) {
    
        $_SESSION['status'] = "No changes have made.";
        $_SESSION['status_code'] = "info";
        header('Location: ../manage_course.php');

    }else{

        // Perform the update operation
        $updateRecord = "UPDATE course_tbl SET course_name='$course_name', course_desc='$course_desc', deptID='$dept_name' WHERE courseID=".$courseID;
        $query_run = mysqli_query($connection, $updateRecord);
        if ($query_run) {

            $_SESSION['status'] = "Course Information updated successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_course.php');
        
        } else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_course.php');
        }

    }

}

?>