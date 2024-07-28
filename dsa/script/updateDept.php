<?php

include('../sessions.php');

if (isset($_POST['update'])) {
    // Retrieve form data
    $deptID = $_POST['dept_id'];
    $dept_name = $_POST['dept_name'];
    $dept_desc = $_POST['dept_desc'];


    $checkRecord = mysqli_query($connection, "SELECT * FROM department_tbl WHERE deptID='$deptID' ");
    $row = mysqli_fetch_assoc($checkRecord);

    // if(mysqli_num_rows($_isChanged) > 0)
    //     {
    if ($row['dept_name'] == $dept_name AND $row['dept_desc'] == $dept_desc) {
    
        $_SESSION['status'] = "No changes have made.";
        $_SESSION['status_code'] = "info";
        header('Location: ../manage_college.php');

    }else{

        // Perform the update operation
        $sql = "UPDATE department_tbl SET dept_name='$dept_name', dept_desc='$dept_desc' WHERE deptID=$deptID";
        $query_run = mysqli_query($connection, $sql);
        if ($query_run) {

            $uid=$_SESSION['uid'];

            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Updated department/College information ($dept_desc)...','successful') ");

            $_SESSION['status'] = "Department Information updated successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_college.php');
        
        } else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_college.php');
        }

    }

}

?>