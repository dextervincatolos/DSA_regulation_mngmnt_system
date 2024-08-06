<?php

include('../sessions.php');

if(isset($_POST['submitForm']))
{
    $faculty_id = $_POST['facultyNum'];
    $faculty_email = $_POST['facultyEmail'];
    $faculty_contact = $_POST['facultyContact'];
    $faculty_fname = $_POST['facultyfName'];
    $faculty_mname = $_POST['facultymName'];
    $faculty_lname = $_POST['facultylName'];
    $faculty_ename = $_POST['facultyeName'];
    $faculty_address = $_POST['facultyAddress'];
    $faculty_role = 'DSA-User';
    $uid = $_SESSION['uid'];

    $countUser = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_role = 'DSA-User' AND user_status != 'deactivated'");

    if (mysqli_num_rows($countUser) < 2)
    {

        $facultyNum_exist = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_number = '$faculty_id' ");

        if (mysqli_num_rows($facultyNum_exist) > 0)
        {
            $_SESSION['status'] = "Faculty number exist. Please use another ID number.";
            $_SESSION['status_code'] = "warning";
            header('Location: ../manage_user.php');
    
        }else{

            $email_exist = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_email= '$faculty_email' || faculty_contact= '$faculty_contact'");

            if (mysqli_num_rows($email_exist) > 0)
            {
                $_SESSION['status'] = "Email or Phone number exist.";
                $_SESSION['status_code'] = "error";
                header('Location: ../manage_user.php');
        
            }else{

                $enc_password = password_hash($faculty_id, PASSWORD_DEFAULT);
                $insertRecord ="INSERT INTO user_tbl (faculty_number, faculty_fname, faculty_mname, faculty_lname, faculty_extname,faculty_role, faculty_email, Faculty_contact, faculty_password, faculty_address, user_status) 
                                VALUES ('$faculty_id', '$faculty_fname','$faculty_mname','$faculty_lname','$faculty_ename', '$faculty_role', '$faculty_email', '$faculty_contact', '$enc_password', '$faculty_address', 'offline')";
                $query_run = mysqli_query($connection, $insertRecord);
        
                if($query_run) {

                    mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Register new user account...','successful') ");

                    $_SESSION['status'] = "New user account registered!";
                    $_SESSION['status_code'] = "success";
                    header('Location: ../manage_user.php');
                }
                else {
                    $_SESSION['status'] = "Something went wrong. Please try again";
                    $_SESSION['status_code'] = "error";
                    header('Location: ../manage_user.php');
                }   
            }    
        }
    }else{
                    
        $_SESSION['status'] = "Maximum user reached!";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_user.php');
            
    }











   
}
