<?php

include('../sessions.php');

if(isset($_POST['submitForm']))
{

    $sy = $_POST['sy'];
    $sem = $_POST['semester'];
    $yearlvl = $_POST['yearlvl'];
    $student = $_POST['student'];
    $policy = $_POST['violatedPolicy'];
    $sanction = $_POST['policySanction'];
    $added_by = $_SESSION['username'];


    $student_Violation_exist= mysqli_query($connection, "SELECT * FROM violation_tbl WHERE spID = $policy AND sanctionID = $sanction AND studID = $student AND semID = $sem AND acadsyrID = $sy AND violation_status = 'Open'");
    
    
    if (mysqli_num_rows($student_Violation_exist) > 0)
    {
        $_SESSION['status'] = "Please check the issued Sanction";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_violation.php');

    }else{
        $insertRecord ="INSERT INTO violation_tbl (studID, spID, sanctionID, yearlvlID, acadsyrID, semID, violation_status, violation_added_by) 
        VALUES ('$student', '$policy','$sanction','$yearlvl','$sy', '$sem', 'Open', '$added_by')";
        $query_run = mysqli_query($connection, $insertRecord);

        if($query_run) {

            $violationID = mysqli_insert_id($connection);

            // Fetch violator's department ID
            $violatorDeptQuery = mysqli_query($connection, "SELECT college FROM student_tbl WHERE studID = '$student'");
            $violatorDept = mysqli_fetch_assoc($violatorDeptQuery)['college'];

            // Fetch all admin users and users in the same department
            $usersQuery = mysqli_query($connection, " SELECT userID, faculty_department FROM user_tbl WHERE faculty_department = '$violatorDept' OR faculty_role IN ('DSA-Admin', 'DSA-User')");


            while ($user = mysqli_fetch_assoc($usersQuery)) {
                $userID = $user['userID'];
                $deptID = $user['faculty_department'];

                // Insert notifications for each user
                $notificationQuery = "INSERT INTO notification_tbl (userID, violationID, deptID, notif_Content, notif_Status) 
                    VALUES ('$userID', '$violationID', '$deptID', 'A new violation has been committed.',0)";
                mysqli_query($connection, $notificationQuery);
            }

            $uid = $_SESSION['uid'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Added new violation...','successful') ");
            
            $_SESSION['status'] = "Violation added successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: ../manage_violation.php');
        }
        else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../manage_violation.php');
        }   
    }
}
