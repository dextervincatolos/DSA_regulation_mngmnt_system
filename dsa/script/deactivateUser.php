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
            $user = $row['faculty_fname'].' '.$row['faculty_lname'];
        
            if($verify==1)
            {
                // Update user_status to 'deactivated'
                mysqli_query($connection, "UPDATE user_tbl SET user_status= 'deactivated' WHERE userID=".$uid);

                mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$adminID', 'Deactivate user account ($user)...','successful') ");

                $_SESSION['status'] = "User account deactivated successfully!";
                $_SESSION['status_code'] = "success";
                header("Location: ../manage_user.php");
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
            header("Location: ../view_faculty.php?id=$uid");
        }   

    }else{

        $_SESSION['status'] = "Please request deactivation to admin!";
        $_SESSION['status_code'] = "error";
        header("Location: ../view_faculty.php?id=$uid");
        exit();

    }

}

?>