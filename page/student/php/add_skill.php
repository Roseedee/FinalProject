<?php
    session_start();
    include('../../../config/server.php');

    $skill_type_id = $_POST['skill-type'];
    $skill_id = $_POST['skill'];
    
    $skill_type = $con->query("select * from skill_type where skt_id='$skill_type_id'");
    $skill_type->execute();
    $row_skill_type = $skill_type->fetch();

    $skill_name = $con->query("select * from skill where sk_id='$skill_id'");
    $skill_name->execute();
    $row_skill_name = $skill_name->fetch();

    $sql = "insert into student_skill values ('$_SESSION[user_id]', '$skill_id', '$row_skill_name[sk_skill]', '$row_skill_type[skt_type]')";
    try {
        $con->exec($sql);
        header('location: ../profile.php');
    }catch(PDOException $e) {
        echo $e->getMessage();
    }


?>