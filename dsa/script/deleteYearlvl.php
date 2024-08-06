<?php
include('../sessions.php');

if (isset($_GET['id'])) {

    $yearlvlID = intval($_GET['id']);

    $fetchQ = mysqli_query($connection,"SELECT year_lvl FROM yearlvl_tbl WHERE yearlvlID =". $yearlvlID);
    $row = mysqli_fetch_assoc($fetchQ);
    $yearlvl = $row['year_lvl'];

    $query = "DELETE FROM yearlvl_tbl WHERE yearlvlID = $yearlvlID";
    $query_run = mysqli_query($connection, $query);
   

    if ($query_run) {

        $uid = $_SESSION['uid'];
        mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Deleted year level ($yearlvl)...','successful') ");

        $_SESSION['status'] = "year level Information Deleted successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../manage_yearlvl.php');
      
    } else {
        $_SESSION['status'] = "Something went wrong. Please try again";
        $_SESSION['status_code'] = "error";
        header('Location: ../manage_yearlvl.php');
    }
} else {
    $_SESSION['status'] = "Course Not Found!";
    $_SESSION['status_code'] = "error";
    header('Location: ../manage_yearlvl.php');
}

?>
