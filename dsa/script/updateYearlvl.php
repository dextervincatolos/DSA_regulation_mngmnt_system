<?php

include('../sessions.php');

if (isset($_POST['update'])) {

    // Retrieve form data
    $yearlvlID = $_POST['yearlvl_id'];
    $yearlvl = $_POST['yearlvl'];


    $checkRecord = mysqli_query($connection, "SELECT * FROM yearlvl_tbl WHERE yearlvlID=".$yearlvlID);
    $row = mysqli_fetch_assoc($checkRecord);

    if ($row['year_lvl'] == $yearlvl) {
    
        $_SESSION['status'] = "No changes have made.";
        $_SESSION['status_code'] = "info";
        header('Location: ../manage_yearlvl.php');

    }else{

        // Perform the update operation
        $updateRecord = "UPDATE yearlvl_tbl SET year_lvl='$yearlvl' WHERE yearlvlID=".$yearlvlID;
        $query_run = mysqli_query($connection, $updateRecord);
        if ($query_run) {

            $_SESSION['status'] = "Year level Information updated successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_yearlvl.php');
        
        } else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_yearlvl.php');
        }

    }

}

?>