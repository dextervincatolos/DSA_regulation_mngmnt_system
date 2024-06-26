<?php
session_start();

include(__DIR__ . '/../dbconfig/dbconn.php');

if(!$_SESSION['uid'])
{
    header('Location: ../login.php');
}

?>
