<?php
include('../sessions.php');


 if (isset($_GET['id'])) {

  
     $deptID = intval($_GET['id']);

    $fetchQ = mysqli_query($connection,"SELECT dept_desc FROM department_tbl WHERE deptID =". $deptID);
    $row = mysqli_fetch_assoc($fetchQ);

    $dept_desc = $row['dept_desc'];

    $deleteQ = mysqli_query($connection,"DELETE FROM department_tbl WHERE deptID =".$deptID);  

    if ($deleteQ) {

        $uid = $_SESSION['uid'];
        mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Deleted department/College ($dept_desc)...','successful') ");

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
