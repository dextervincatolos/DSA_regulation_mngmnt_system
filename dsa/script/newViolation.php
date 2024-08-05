<?php

include('../sessions.php');

// Register Student
if(isset($_POST['submitForm']))
{

    $sy = $_POST['sy'];
    $sem = $_POST['semester'];
    $yearlvl = $_POST['yearlvl'];
    $student = $_POST['student'];
    $policy = $_POST['violatedPolicy'];
    $sanction = $_POST['policySanction'];
    $added_by = $_SESSION['username'];

    // Check for existing violations
    $student_Violation_exist= mysqli_query($connection, "SELECT * FROM violation_tbl WHERE spID = $policy AND sanctionID = $sanction AND studID = $student AND semID = $sem AND acadsyrID = $sy AND violation_status = 'Open'");
    
    
    if (mysqli_num_rows($student_Violation_exist) > 0)
    {
        $_SESSION['status'] = "Please check the issued Sanction";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_violation.php');

    }else{
        $insertRecord ="INSERT INTO violation_tbl (studID, spID, sanctionID, yearlvlID, acadsyrID, semID, violation_status, violation_added_by) 
        VALUES ('$student', '$policy','$sanction','$yearlvl','$sy', '$sem', 'Open', '$added_by')";
        $query_run = mysqli_query($connection, $insertRecord);

        if($query_run) {

            $uid = $_SESSION['uid'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Added new violation...','successful') ");
            
            $_SESSION['status'] = "Violation added successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_violation.php');
        }
        else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_violation.php');
        }   
    }
}
