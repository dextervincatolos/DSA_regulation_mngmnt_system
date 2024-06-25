<?php
include('../sessions.php');

// Check if the `id` parameter is set in the URL
if (isset($_GET['id'])) {

    // Get the department ID from the URL
    $deptID = intval($_GET['id']);

    // Prepare and execute the deletion query
    $query = "DELETE FROM department_tbl WHERE deptID = $deptID";
    $query_run = mysqli_query($connection, $query);
   

    if ($query_run) {

        $_SESSION['status'] = "Department Information Deleted successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../manage_college.php');
      
    } else {
        $_SESSION['status'] = "Something went wrong. Please try again";
        $_SESSION['status_code'] = "error";
        header('Location: ../manage_college.php');
    }
} else {
    $_SESSION['status'] = "Department Not Found!";
    $_SESSION['status_code'] = "error";
    header('Location: ../manage_college.php');
}

?>
