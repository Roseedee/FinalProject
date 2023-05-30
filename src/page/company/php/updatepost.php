<?php 
    session_start();
    include('../../../config/server.php');
    $p_title = $_POST['title-post'];
    $p_details = $_POST['details-post'];
    $job = $_POST['job'];

    $post_id = (isset($_SESSION['post_id'])) ? $_SESSION['post_id'] : '';

    $sql = "Update post set p_title='$p_title', p_details='$p_details', j_id='$job' where p_id='$post_id'";
    try {
        $con->exec($sql);
        echo("<script>location.href = '../profile.php';</script>");
        
    }catch(PDOException $e) {
        echo $e->getMessage();
    }

?>