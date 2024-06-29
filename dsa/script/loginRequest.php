<?php
include('../sessions.php');

//Faculty login
if(isset($_POST['login']))
{
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    $validateCred = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_email='$login_email' ");

    if(mysqli_num_rows($validateCred) > 0)
        {
        $row = mysqli_fetch_assoc($validateCred);
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
}
?>