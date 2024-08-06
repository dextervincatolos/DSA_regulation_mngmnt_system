<?php

include('../sessions.php');

if (isset($_POST['update'])) {

    $yearlvlID = $_POST['yearlvl_id'];
    $yearlvl = $_POST['yearlvl'];

    $checkRecord = mysqli_query($connection, "SELECT * FROM yearlvl_tbl WHERE year_lvl = '$yearlvl' AND yearlvlID !='yearlvlID'");

    if (mysqli_num_rows($checkRecord) > 0){

        $_SESSION['status'] = "Year level exist.";
        $_SESSION['status_code'] = "error";
        header('Location: ../manage_yearlvl.php');

    }else{

        $checkRecord = mysqli_query($connection, "SELECT * FROM yearlvl_tbl WHERE yearlvlID=".$yearlvlID);
        $row = mysqli_fetch_assoc($checkRecord);

        if ($row['year_lvl'] == $yearlvl) {
        
            $_SESSION['status'] = "No changes have made.";
            $_SESSION['status_code'] = "info";
            header('Location: ../manage_yearlvl.php');

        }else{
            $updateRecord = "UPDATE yearlvl_tbl SET year_lvl='$yearlvl' WHERE yearlvlID=".$yearlvlID;
            $query_run = mysqli_query($connection, $updateRecord);

            if ($query_run) {

                $uid = $_SESSION['uid'];
                mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Updated year level ($yearlvl)...','successful') ");
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

}

?>