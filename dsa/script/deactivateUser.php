<?php

include('../sessions.php');

if (isset($_POST['deactivate'])) {

    // Retrieve form data
    $uid = $_POST['userID'];
    $pass = $_POST['admin_password'];
    $adminID = $_SESSION['uid'];
    $userRole = $_SESSION['role'];

    if ($userRole == 'DSA-Admin') {
        
        $validatePass = mysqli_query($connection, "SELECT * FROM user_tbl WHERE userID = '$adminID' ");

        if(mysqli_num_rows($validatePass) > 0){

            $row = mysqli_fetch_assoc($validatePass);

            $verify = password_verify($pass, $row['faculty_password']);
        
            if($verify==1)
            {
                // Update user_status to 'deactivated'
                mysqli_query($connection, "UPDATE user_tbl SET user_status= 'deactivated' WHERE userID=".$uid);

                $_SESSION['status'] = "User account deactivated successfully!";
                $_SESSION['status_code'] = "success";
                header("Location: ../view_faculty.php?id=$uid");
                exit();
            
            }
            else 
            {
                $_SESSION['status'] = "Wrong Password! Please Try Again";
                $_SESSION['status_code'] = "error";
                header("Location: ../view_faculty.php?id=$uid");
                exit();
            }
        }
        else
        {
            $_SESSION['status'] = "Something went wrong!";
            $_SESSION['status_code'] = "error";
            header('Location: ../login.php');
        }   

    }else{

        $_SESSION['status'] = "You are not allowed to perform this action!";
        $_SESSION['status_code'] = "error";
        header("Location: ../view_faculty.php?id=$uid");
        exit();

    }

    $validatePass = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_email='$login_email' ");

    if(mysqli_num_rows($validatePass) > 0)
        {
        $row = mysqli_fetch_assoc($validatePass);
        $verify = password_verify($login_password, $row['faculty_password']);
        
        if($verify==1)
        {
            // Update loginStatus to 'online'
            mysqli_query($connection, "UPDATE user_tbl SET user_status='online' WHERE userID=".$row['userID']);

            $_SESSION['uid'] = $row['userID'];
            $_SESSION['role'] = $row['faculty_role'];
            $_SESSION['username'] = $row['faculty_fname'].' '.$row['faculty_lname'];
            header("Location: ../dashboard.php");
        
        }
        else 
        {
            $_SESSION['status'] = "Wrong user Password.";
            $_SESSION['status_code'] = "warning";
            header('Location: ../login.php');
        }
     }
    else
    {
        $_SESSION['status'] = "Incorrect Email.";
        $_SESSION['status_code'] = "warning";
        header('Location: ../login.php');
    }






















    $checkRecord = mysqli_query($connection, "SELECT * FROM semester_tbl WHERE semID='$semID' ");
    $row = mysqli_fetch_assoc($checkRecord);

    if ($row['sem'] == $semester ) {
    
        $_SESSION['status'] = "No changes have made.";
        $_SESSION['status_code'] = "info";
        header('Location: ../manage_acadsyear.php');

    }else{

        // Perform the update operation
        $updateRecord = "UPDATE semester_tbl SET semester='$semester' WHERE semID=".$semID;
        $query_run = mysqli_query($connection, $updateRecord);
        if ($query_run) {

            $_SESSION['status'] = "Semester Information updated successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_acadsyear.php');
        
        } else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_acadsyear.php');
        }

    }

}

?>