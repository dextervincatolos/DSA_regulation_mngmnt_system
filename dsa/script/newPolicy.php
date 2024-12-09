<?php

include('../sessions.php');

    if(isset($_POST['save_policy'])) {

        $policy_code = $_POST['policy_code'];
        $policy_title = $_POST['policy_title'];
        $policy_description = $_POST['policy_description'];
        $policy_type = $_POST['policyType'];
        $uid = $_SESSION['uid'];

        $insert_new_policy = mysqli_query($connection, "INSERT INTO schoolpolicy_tbl (policy_code,policy_title, policy_desc,policy_type)  VALUES ('$policy_code', '$policy_title', '$policy_description','$policy_type') ");
        $policyID = mysqli_insert_id($connection);

        if($policyID != '' ) {

            mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'New school policy added ($policy_title)..','successful') ");

            $sanctions = array();
            $policy_sanction = $_POST['policy_sanction'];            

            for ($i=0; $i < count($policy_sanction); $i++){ 

                $insert_policy_rule = mysqli_query($connection,"INSERT INTO sanction_tbl (spID, sanction) VALUES ( '$policyID', '$policy_sanction[$i]')");
            }
                mysqli_query($connection, "INSERT INTO activity_logs_tbl (userID, _activity,_status)  VALUES ('$uid', 'New school policy sanction added for ($policy_title)...','successful') ");

                $_SESSION['status'] = "New Policy registered!";
                $_SESSION['status_code'] = "success";
                header('Location: ../policy.php');

        }else{
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../policy.php');
        }
    }