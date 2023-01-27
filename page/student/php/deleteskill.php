<?php
    session_start();
    include('../../../config/server.php');
    $sk_id = $_GET['sk_id'];
    $sql = "delete from student_skill where sk_id='$sk_id'";
    try {
        $con->exec($sql);
        header('location: ../profile.php');
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>