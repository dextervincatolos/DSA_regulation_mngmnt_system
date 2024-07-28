<?php

include('../sessions.php');

// register user
if(isset($_POST['submitForm']))
{
    $course_name = $_POST['course_name'];
    $course_desc = $_POST['course_desc'];
    $dept_name = $_POST['dept_name'];
    
    $check_duplicate = mysqli_query($connection, "SELECT * FROM course_tbl WHERE course_name = '$course_name' || course_desc = '$course_desc'");

    if (mysqli_num_rows($check_duplicate) > 0)
    {
        $_SESSION['status'] = "Course exist.";
        $_SESSION['status_code'] = "error";
        header('Location: ../manage_course.php');
    }
    else
    {
        $newCourse ="INSERT INTO course_tbl (deptID,course_name, course_desc) VALUES ('$dept_name','$course_name', '$course_desc')";
        $query_run = mysqli_query($connection, $newCourse);

        if($query_run) {

            $uid = $_SESSION['uid'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Created new course ($course_desc)...','successful') ");

            $_SESSION['status'] = "New Course added!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_course.php');
        }
        else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_course.php');
        }   
    }
}
