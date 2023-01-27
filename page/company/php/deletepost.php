<?php
    include('../../../config/server.php');

    if(isset($_GET['post-id'])) {
        $post_id = $_GET['post-id'];
        // echo $post_id;
        try {
            $con->query("delete from post where p_id='$post_id'");
            header('location: ../profile.php');
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }else {
        header('location: ../profile.php');
    }

?>