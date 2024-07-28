<?php

include('../sessions.php');

// register user
if(isset($_POST['submitForm']))
{
    $dept_name = $_POST['dept_name'];
    $dept_desc = $_POST['dept_desc'];
    
    $check_duplicate = mysqli_query($connection, "SELECT * FROM department_tbl WHERE dept_name = '$dept_name' || dept_desc = '$dept_desc'");

    if (mysqli_num_rows($check_duplicate) > 0)
    {
        $_SESSION['status'] = "Department exist.";
        $_SESSION['status_code'] = "error";
        header('Location: ../manage_college.php');
    }
    else
    {
        $newDepartment ="INSERT INTO department_tbl (dept_name, dept_desc) VALUES ('$dept_name', '$dept_desc')";
        $query_run = mysqli_query($connection, $newDepartment);

        if($query_run) {

            $uid = $_SESSION['uid'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Created new department/College ($dept_desc)...','successful') ");

            $_SESSION['status'] = "New Department/College added!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_college.php');
        }
        else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_college.php');
        }   
    }
}
