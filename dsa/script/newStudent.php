<?php

include('../sessions.php');

if(isset($_POST['submitForm']))
{
    $student_number = $_POST['studentNum'];
    $student_gender = $_POST['studentGender'];
    $student_email = $_POST['studentEmail'];
    $student_contact = $_POST['studentContact'];
    $student_fname = $_POST['studentfName'];
    $student_mname = $_POST['studentmName'];
    $student_lname = $_POST['studentlName'];
    $student_ename = $_POST['studenteName'];
    $student_college = $_POST['studentCollege'];
    $student_course = $_POST['studentCourse'];
    $student_address = $_POST['studentAddress'];
    $encodedBy = $_SESSION['username'];

    $studentNum_exist = mysqli_query($connection, "SELECT * FROM student_tbl WHERE student_number = '$student_number' ");

    if (mysqli_num_rows($studentNum_exist) > 0)
    {
        $_SESSION['status'] = "student number exist. Please use another Id number.";
        $_SESSION['status_code'] = "warning";
        header('Location: ../manage_student.php');

    }else{

        $email_exist = mysqli_query($connection, "SELECT * FROM student_tbl WHERE student_email= '$student_email' ");

        if (mysqli_num_rows($email_exist) > 0)
        {
            $_SESSION['status'] = "Email exist. Please use another Email.";
            $_SESSION['status_code'] = "warning";
            header('Location: ../manage_student.php');
    
        }else{

            $insertRecord ="INSERT INTO student_tbl (student_number, student_fname, student_mname, student_lname, student_extname, student_email, student_contact, student_address, student_gender,college,courseID,added_by,_isActive) 
                            VALUES ('$student_number', '$student_fname','$student_mname','$student_lname','$student_ename', '$student_email', '$student_contact', '$student_address', '$student_gender','$student_college','$student_course','$encodedBy','Active')";
            $query_run = mysqli_query($connection, $insertRecord);
    
            if($query_run) {

                $uid = $_SESSION['uid'];
                mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'Created new student record ($student_fname $student_lname)...','successful') ");

                $_SESSION['status'] = "New Student account registered!";
                $_SESSION['status_code'] = "success";
                header('Location: ../manage_student.php');
            }
            else {
                $_SESSION['status'] = "Something went wrong. Please try again";
                $_SESSION['status_code'] = "error";
                header('Location: ../manage_student.php');
            }   
            
        }    
        
    }
}
