<?php

include('../sessions.php');

if (isset($_POST['update'])) {

    $semID = $_POST['sem_id'];
    $semester = $_POST['sem'];

    $checkRecord = mysqli_query($connection, "SELECT * FROM semester_tbl WHERE semID='$semID' ");
    $row = mysqli_fetch_assoc($checkRecord);

    if ($row['sem'] == $semester ) {
    
        $_SESSION['status'] = "No changes have made.";
        $_SESSION['status_code'] = "info";
        header('Location: ../manage_acadsyear.php');

    }else{

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