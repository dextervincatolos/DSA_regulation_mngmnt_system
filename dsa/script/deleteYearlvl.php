<?php
include('../sessions.php');

// Check if the `id` parameter is set in the URL
if (isset($_GET['id'])) {

    // Get the Yearlvl ID from the URL
    $yearlvlID = intval($_GET['id']);

    // Prepare and execute the deletion query
    $query = "DELETE FROM yearlvl_tbl WHERE yearlvlID = $yearlvlID";
    $query_run = mysqli_query($connection, $query);
   

    if ($query_run) {

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
