<?php

include('../sessions.php');

if (isset($_POST['processViolation'])) {

    $pass = $_POST['user_password'];
    $vid = $_POST['violationID'];
    $uid = $_SESSION['uid'];
        
    $validatePass = mysqli_query($connection, "SELECT * FROM user_tbl WHERE userID = '$uid' ");

    if(mysqli_num_rows($validatePass) > 0){

        $row = mysqli_fetch_assoc($validatePass);

        $verify = password_verify($pass, $row['faculty_password']);

        $updated_by = $row['faculty_fname'].''.$row['faculty_lname'];
    
        if($verify==1)
        {
            $closeViolation = mysqli_query($connection, "UPDATE violation_tbl SET violation_status= 'resolved', violation_updated_by= '$updated_by', updated_at = CURRENT_TIMESTAMP WHERE violationID=".$vid);

            if ($closeViolation) {

                mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Violation resolved ($vid)...','successful') ");

                $_SESSION['status'] = "Violation resolved!";
                $_SESSION['status_code'] = "success";
                header("Location: ../manage_violation.php");
                exit();
            }else{

                mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Trying to resolve violation ($vid)...','failed') ");

                $_SESSION['status'] = "Resolving violation failed!";
                $_SESSION['status_code'] = "error";
                header("Location: ../manage_violation.php");
                exit();

            }
        }
        else 
        {
            $_SESSION['status'] = "Wrong Password! Please Try Again";
            $_SESSION['status_code'] = "error";
            header("Location: ../manage_violation.php");
            exit();
        }
    }
    else
    {
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: ../manage_violation.php');
    }   
}

?>