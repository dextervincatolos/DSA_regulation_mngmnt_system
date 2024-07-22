<?php

include('../sessions.php');

    //save policy to Database
    if(isset($_POST['save_policy']))
    {

        $policy_title = $_POST['policy_title'];
        $policy_description = $_POST['policy_description'];

        // insert new policy to policy_tbl
        $insert_new_policy = mysqli_query($connection, "INSERT INTO schoolpolicy_tbl (policy_title, policy_desc)  VALUES ('$policy_title', '$policy_description') ");
        $policyID = mysqli_insert_id($connection);

        if($policyID != '' )
        {

            $sanctions = array();
            $policy_sanction = $_POST['policy_sanction'];            

            for ($i=0; $i < count($policy_sanction); $i++) 
            { 
                // array_push($sanctions, $policy_sanction[$i]);
                $insert_policy_rule = mysqli_query($connection,"INSERT INTO sanction_tbl (spID, sanction) VALUES ( '$policyID', '$policy_sanction[$i]')");
            }

           
                $_SESSION['status'] = "New user account registered!";
                $_SESSION['status_code'] = "success";
                header('Location: ../policy.php');

        }else{
          
            $_SESSION['status'] = "Something went wrong. Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: ../policy.php');
        
        }
    }