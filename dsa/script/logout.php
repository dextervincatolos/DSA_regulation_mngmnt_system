<?php

include('../sessions.php');

    //user sign out
    if(isset($_POST['signOut']))
    {
        // Update user status to 'offline' when signing out
        mysqli_query($connection, "UPDATE user_tbl SET user_status='offline' WHERE userID=".$_SESSION['uid']);

        session_destroy();
        unset($_SESSION['uid']);
        header('Location: ../../index.php');
    }

?>