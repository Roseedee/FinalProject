<?php
    session_start();
    include('../../../config/server.php');
    // unset($_SESSION['user_id']);
    // unset($_SESSION['login_state']);
    session_destroy();
    header('location: ../../../index.php');
?>