<?php
include('../sessions.php');

//support login
if(isset($_POST['login']))
{
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    $res = mysqli_query($connection, "SELECT * FROM administrator_tbl WHERE admin_email='$login_email' ");

    if(mysqli_num_rows($res) > 0)
        {
        $row = mysqli_fetch_assoc($res);
        $verify = password_verify($login_password, $row['admin_password']);
        
        if($verify==1)
        {
            // Update loginStatus to 'online'
            mysqli_query($connection, "UPDATE administrator_tbl SET login_status='online' WHERE admin_email='$login_email'");

            $_SESSION['uid'] = $row['adminID'];
            $_SESSION['role'] = $row['admin_name'];
            header("Location: ../dashboard.php");
        
        }
        else 
        {
            $_SESSION['status'] = "Wrong administrator Password.";
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

// //user sign out
if(isset($_POST['signOut']))
{
    // Update loginStatus to 'offline' when signing out
    mysqli_query($connection, "UPDATE administrator_tbl SET login_status='offline' WHERE adminID=".$_SESSION['uid']);

    session_destroy();
    unset($_SESSION['uid']);
    header('Location: login.php');
}
?>