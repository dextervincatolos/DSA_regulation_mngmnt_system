<?php
include('../sessions.php');

//Faculty login
if(isset($_POST['login']))
{
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    $validateCred = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_email='$login_email' AND user_status != 'deactivated'");

    if(mysqli_num_rows($validateCred) > 0)
        {
        $row = mysqli_fetch_assoc($validateCred);
        $verify = password_verify($login_password, $row['faculty_password']);

        $uid = $row['userID'];
        
        if($verify==1)
        {
            mysqli_query($connection, "UPDATE user_tbl SET user_status='online' WHERE userID=".$uid);

            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Login Initiated...','successful') ");

            $_SESSION['uid'] = $uid;
            $_SESSION['role'] = $row['faculty_role'];
            $_SESSION['username'] = $row['faculty_fname'].' '.$row['faculty_lname'];
            $_SESSION['department'] = $row['faculty_department'];
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
}
?>