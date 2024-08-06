<?php

include('../sessions.php');

if (isset($_POST['update'])) {

    $userID = $_POST['userID'];
    $uid = $_SESSION['uid'];

    $checkRecord = mysqli_query($connection, "SELECT * FROM user_tbl WHERE userID='$userID' ");
    $currentData  = mysqli_fetch_assoc($checkRecord);

    $fieldsToUpdate = [];
    $values = [];

    function addField($fieldName, $newValue) {
        global $fieldsToUpdate, $values;
        $fieldsToUpdate[] = "$fieldName = '$newValue'";
    }

    if (trim($_POST['facultyfName']) != $currentData['faculty_fname']) {
        addField('faculty_fname', trim($_POST['facultyfName']));
    }
    if (trim($_POST['facultymName']) != $currentData['faculty_mname']) {
        addField('faculty_mname', trim($_POST['facultymName']));
    }
    if (trim($_POST['facultylName']) != $currentData['faculty_lname']) {
        addField('faculty_lname', trim($_POST['facultylName']));
    }
    if (trim($_POST['facultyeName']) != $currentData['faculty_extname']) {
        addField('faculty_extname', trim($_POST['facultyeName']));
    }
    
    if (trim($_POST['facultyContact']) != $currentData['faculty_contact']) {
        $newContact = trim($_POST['facultyContact']);
        $checkContact = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_contact='$newContact' AND userID != '$userID' AND user_status != 'deactivated'");
        if (mysqli_num_rows($checkContact) > 0) {
            $_SESSION['status'] = "Phone number already exists!";
            $_SESSION['status_code'] = "error";
            header("Location: ../view_faculty.php?id=$userID");
            exit();
        } else {
            addField('faculty_contact', $newContact);
        }
    }

    if (trim($_POST['facultyEmail']) != $currentData['faculty_email']) {
        $newEmail = trim($_POST['facultyEmail']);
        $checkEmail = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_email='$newEmail' AND userID != '$userID' AND user_status != 'deactivated'");
        if (mysqli_num_rows($checkEmail) > 0) {
            $_SESSION['status'] = "Email already exists!";
            $_SESSION['status_code'] = "error";
            header("Location: ../view_faculty.php?id=$userID");
            exit();
        } else {
            addField('faculty_email', $newEmail);
        }
    }


    if (trim($_POST['facultyAddress']) != $currentData['faculty_address']) {
        addField('faculty_address', trim($_POST['facultyAddress']));
    }

    if (!empty($_POST['facultyNewpassword'])) {
       
        if (password_verify($_POST['facultyOldpassword'], $currentData['faculty_password'])) {
            if ($_POST['facultyNewpassword'] == $_POST['confPassword']) {
                $newPasswordHash = password_hash($_POST['facultyNewpassword'], PASSWORD_DEFAULT);
                addField('faculty_password', $newPasswordHash);
            } else {
                $_SESSION['status'] = "New password and confirmation do not match!";
                $_SESSION['status_code'] = "info";
                header("Location: ../view_faculty.php?id=$userID");
                exit();
            }
        } else {
            $_SESSION['status'] = "Old password is incorrect!";
            $_SESSION['status_code'] = "info";
            header("Location: ../view_faculty.php?id=$userID");
            exit();
            
        }
    }

    if (!empty($fieldsToUpdate)) {
        $sql = "UPDATE user_tbl SET " . implode(", ", $fieldsToUpdate) . " WHERE userID = '$userID'";
        $query_run = mysqli_query($connection, $sql);

        if ($query_run) {
            $user= $currentData['faculty_fname'].' '.$currentData['faculty_lname'];
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Updated user information ($user)...','successful') ");

            $_SESSION['status'] = "Your Information updated successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: ../view_faculty.php?id=$userID");
        } else {
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header("Location: ../view_faculty.php?id=$userID");
        }
    } else {
        $_SESSION['status'] = "No changes Detected!";
        $_SESSION['status_code'] = "info";
        header("Location: ../view_faculty.php?id=$userID");
    }

}

?>

