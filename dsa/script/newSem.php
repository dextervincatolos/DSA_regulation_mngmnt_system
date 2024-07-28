<?php

include('../sessions.php');

// register user
if(isset($_POST['submitForm']))
{
    $sem = $_POST['sem'];
    
    $check_duplicate = mysqli_query($connection, "SELECT * FROM semester_tbl WHERE semester = '$sem' ");

    if (mysqli_num_rows($check_duplicate) > 0)
    {
        $_SESSION['status'] = "Semester exist.";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_acadsyear.php');
    }
    else
    {
        $newSemester ="INSERT INTO semester_tbl (semester) VALUES ('$sem')";
        $query_run = mysqli_query($connection, $newSemester);

        if($query_run) {

            $uid = $_SESSION['uid'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'New semester opened ($sem)...','successful') ");

            $_SESSION['status'] = "Semester added successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_acadsyear.php');
        }
        else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_acadsyear.php');
        }   
    }
}
