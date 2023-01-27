<?php
    session_start();
    include('../config/server.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmtuser = $con->query("select * from account where username='$username' and password='$password';");
        $stmtuser->execute();
        if($stmtuser->rowCount() < 1) {
            $_SESSION['log-signin'] = "ไม่พบบัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
            echo("<script>location.href = '../login.php';</script>");
            
        }else {
            $row = $stmtuser->fetch();
            $_SESSION['user_id'] = $row['ac_id'];
            $_SESSION['login_state'] = "Successfully";
            if($row['act_id'] == '1') {
                header('location: ../page/student/profile.php');
            }else if($row['act_id'] == '2') {
                header('location: ../page/company/profile.php');
            }
        }
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>