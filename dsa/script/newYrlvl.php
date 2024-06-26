<?php

include('../sessions.php');

// register user
if(isset($_POST['submitForm']))
{
    $year_level = $_POST['yearlvl'];
    
    $check_duplicate = mysqli_query($connection, "SELECT * FROM yearlvl_tbl WHERE year_lvl = '$year_level' ");

    if (mysqli_num_rows($check_duplicate) > 0)
    {
        $_SESSION['status'] = "Year level exist.";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_yearlvl.php');
    }
    else
    {
        $newYrlvl ="INSERT INTO yearlvl_tbl (year_lvl) VALUES ('$year_level')";
        $query_run = mysqli_query($connection, $newYrlvl);

        if($query_run) {
            $_SESSION['status'] = "New Year level added!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_yearlvl.php');
        }
        else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_yearlvl.php');
        }   
    }
}
