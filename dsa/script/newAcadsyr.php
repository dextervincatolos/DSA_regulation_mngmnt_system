<?php

include('../sessions.php');

if(isset($_POST['submitForm']))
{
    $_from = $_POST['_from'];
    $_to = $_POST['_to'];

    $sy = 'S.Y '.$_from.' '.$_to;
    
    $check_duplicate = mysqli_query($connection, "SELECT * FROM academic_year_tbl WHERE _from = '$_from' AND _to ='$_to' ");

    if (mysqli_num_rows($check_duplicate) > 0)
    {
        $_SESSION['status'] = "Academic year exist.";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_acadsyear.php');
    }
    else
    {
        $newAcadsyr ="INSERT INTO academic_year_tbl (_from,_to) VALUES ('$_from','$_to')";
        $query_run = mysqli_query($connection, $newAcadsyr);

        if($query_run) {

            $uid = $_SESSION['uid'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'New School year opened ($sy)...','successful') ");

            $_SESSION['status'] = "New Academic Year added!";
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
