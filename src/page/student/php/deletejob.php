<?php
    session_start();
    include('../../../config/server.php');
    $j_id = $_GET['j_id'];
    $sql = "delete from student_job where j_id='$j_id'";
    try {
        $con->exec($sql);
        header('location: ../profile.php');
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>