<?php
    session_start();
    include('../../../config/server.php');
    if(isset($_GET['user-id'])) {
        $user_id = $_GET['user-id']; 
        if(!empty($user_id)) {
            $con->exec("Delete from account where ac_id='$user_id'");
            session_destroy();
            header('location: ../../../login.php');
        }else {
            echo 'User is no define <a href="../../../login.php">click he</a> for login';
        }
    }else {
        echo "Not assign";
    }
    
?>