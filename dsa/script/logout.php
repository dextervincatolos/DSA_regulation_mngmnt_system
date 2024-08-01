<?php

include('../sessions.php');

    //user sign out
    if(isset($_POST['signOut']))
    {
        $uid = $_SESSION['uid'];

        $validateStatus = mysqli_query($connection, "SELECT user_status FROM user_tbl WHERE userID='$uid' AND user_status != 'online'");
        
        if(mysqli_num_rows($validateStatus) > 0){

            session_destroy();
            unset($_SESSION['uid']);
            header('Location: ../../index.php');
            
        }else{

            mysqli_query($connection, "UPDATE user_tbl SET user_status='offline' WHERE userID=".$uid);
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Initiated logout...','successful') ");

            session_destroy();
            unset($_SESSION['uid']);
            header('Location: ../../index.php');

        }
       

        
        
    }

?>