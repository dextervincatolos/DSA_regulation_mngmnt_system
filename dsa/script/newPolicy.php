<?php

include('../sessions.php');

    //save policy to Database
    if(isset($_POST['save_policy'])) {

        $policy_title = $_POST['policy_title'];
        $policy_description = $_POST['policy_description'];
        $uid = $_SESSION['uid'];

        // insert new policy to policy_tbl
        $insert_new_policy = mysqli_query($connection, "INSERT INTO schoolpolicy_tbl (policy_title, policy_desc)  VALUES ('$policy_title', '$policy_description') ");
        $policyID = mysqli_insert_id($connection);

        if($policyID != '' ) {

            //log activity
            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'New school policy added ($policy_title)..','successfull') ");

            $sanctions = array();
            $policy_sanction = $_POST['policy_sanction'];            

            for ($i=0; $i < count($policy_sanction); $i++){ 

                $insert_policy_rule = mysqli_query($connection,"INSERT INTO sanction_tbl (spID, sanction) VALUES ( '$policyID', '$policy_sanction[$i]')");
            }
                //log activity
                mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'New school policy sanction added for ($policy_title)...','successfull') ");

                $_SESSION['status'] = "New Policy registered!";
                $_SESSION['status_code'] = "success";
                header('Location: ../policy.php');

        }else{
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../policy.php');
        }
    }