<?php

include('../sessions.php');

// register user
if(isset($_POST['submitForm']))
{
    $faculty_id = $_POST['facultyNum'];
    $faculty_role = 'User';
    $faculty_email = $_POST['facultyEmail'];
    $faculty_fname = $_POST['facultyfName'];
    $faculty_mname = $_POST['facultymName'];
    $faculty_lname = $_POST['facultylName'];
    $faculty_ename = $_POST['facultyeName'];
    $faculty_address = $_POST['facultyAddress'];


    $countUser = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_role = 'User' ");

    if (mysqli_num_rows($countUser) < 2)
    {

        $facultyNum_exist = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_number = '$faculty_id' ");

        if (mysqli_num_rows($facultyNum_exist) > 0)
        {
            $_SESSION['status'] = "Faculty number exist. Please use another Id number.";
            $_SESSION['status_code'] = "warning";
            header('Location: ../manage_user.php');
    
        }else{

            $email_exist = mysqli_query($connection, "SELECT * FROM user_tbl WHERE faculty_email= '$faculty_email' ");

            if (mysqli_num_rows($email_exist) > 0)
            {
                $_SESSION['status'] = "Email exist. Please use another Id number.";
                $_SESSION['status_code'] = "warning";
                header('Location: ../manage_user.php');
        
            }else{

                $enc_password = password_hash($faculty_id, PASSWORD_DEFAULT);
                $insertRecord ="INSERT INTO user_tbl (faculty_number, faculty_fname, faculty_mname, faculty_lname, faculty_extname,faculty_role, faculty_email, Faculty_contact, faculty_password, faculty_address, login_status) 
                                VALUES ('$faculty_id', '$faculty_fname','$faculty_mname','$faculty_lname','$faculty_ename', '$faculty_role', '$faculty_email', '', '$enc_password', '$faculty_address', '')";
                $query_run = mysqli_query($connection, $insertRecord);
        
                if($query_run) {
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
                    
        $_SESSION['status'] = "Maximum user registration reached!";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_user.php');
            
    }











   
}
