<?php
    session_start();
    include('../../../config/server.php');

    $job_id = $_POST['job'];

    $sql_get_job = "select * from job where j_id='$job_id'";
    $jobstmt = $con->query($sql_get_job);
    $jobstmt->execute();
    $job_row = $jobstmt->fetch();

    $sql = "Insert into student_job value ('$_SESSION[user_id]', '$job_id', '$job_row[j_jobname]')";
    try {
        $con->exec($sql);
        header('location: ../profile.php');
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>