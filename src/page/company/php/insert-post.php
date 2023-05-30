<?php 
    session_start();
    include('../../../config/server.php');
    

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title-post'];
    $details = $_POST['details-post'];
    $job = $_POST['job'];
    
    try {
        $con->exec("insert into post values (NULL, '$title', '$details', NULL, '$job', '$user_id')");
        header('location: ../profile.php');
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    

?>