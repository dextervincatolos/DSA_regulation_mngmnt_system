<?php

include('../sessions.php');

if (isset($_POST['update'])) {

    $studID = $_POST['studID'];
    $uid = $_SESSION['uid'];

    $checkRecord = mysqli_query($connection, "SELECT * FROM student_tbl WHERE studID='$studID' ");
    $currentData  = mysqli_fetch_assoc($checkRecord);

    $fieldsToUpdate = [];
    $values = [];

    function addField($fieldName, $newValue) {
        global $fieldsToUpdate, $values;
        $fieldsToUpdate[] = "$fieldName = '$newValue'";
    }
    // studentCollege
    // studentCourse
    // Check each field for changes
    if (trim($_POST['studFName']) != $currentData['student_fname']) {
        addField('student_fname', trim($_POST['studFName']));
    }
    if (trim($_POST['studMName']) != $currentData['student_mname']) {
        addField('student_mname', trim($_POST['studMName']));
    }
    if (trim($_POST['studLName']) != $currentData['student_lname']) {
        addField('student_lname', trim($_POST['studLName']));
    }
    if (trim($_POST['studEName']) != $currentData['student_extname']) {
        addField('student_extname', trim($_POST['studEName']));
    }
    if (trim($_POST['studentCollege']) != $currentData['college']) {
        addField('college', trim($_POST['studentCollege']));
    }
    if (trim($_POST['studentCourse']) != $currentData['courseID']) {
        addField('courseID', trim($_POST['studentCourse']));
    }
    
    if (trim($_POST['studContact']) != $currentData['student_contact']) {
        $newContact = trim($_POST['studContact']);
        $checkContact = mysqli_query($connection, "SELECT * FROM student_tbl WHERE student_contact='$newContact' AND studID != '$studID'");
        if (mysqli_num_rows($checkContact) > 0) {
            $_SESSION['status'] = "Phone number already exists!";
            $_SESSION['status_code'] = "error";
            header("Location: ../view_student.php?id=$studID");
            exit();
        } else {
            addField('student_contact', $newContact);
        }
    }

    if (trim($_POST['studEmail']) != $currentData['student_email']) {
        $newEmail = trim($_POST['studEmail']);
        $checkEmail = mysqli_query($connection, "SELECT * FROM student_tbl WHERE student_email='$newEmail' AND studID != '$studID'");
        if (mysqli_num_rows($checkEmail) > 0) {
            $_SESSION['status'] = "Email already exists!";
            $_SESSION['status_code'] = "error";
            header("Location: ../view_student.php?id=$studID");
            exit();
        } else {
            addField('student_email', $newEmail);
        }
    }
   

    if (trim($_POST['stuDAddress']) != $currentData['student_address']) {
        addField('student_address', trim($_POST['stuDAddress']));
    }

    // If there are fields to update, construct and execute the query
    if (!empty($fieldsToUpdate)) {
        $sql = "UPDATE student_tbl SET " . implode(", ", $fieldsToUpdate) . " WHERE studID = '$studID'";
        $query_run = mysqli_query($connection, $sql);

        if ($query_run) {
            $user= $currentData['student_fname'].' '.$currentData['student_lname'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Updated student information ($user)...','successful') ");

            $_SESSION['status'] = "Student Information updated successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: ../view_student.php?id=$studID");
        } else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header("Location: ../view_student.php?id=$studID");
        }
    } else {
        $_SESSION['status'] = "No changes Detected!";
        $_SESSION['status_code'] = "info";
        header("Location: ../view_student.php?id=$studID");
    }

}

?>

