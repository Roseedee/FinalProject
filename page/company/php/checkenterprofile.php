<?php
    session_start();
    $_SESSION['details'] = $_POST['details'];
    $_SESSION['name-eng'] = $_POST['name-eng'];
    $error_n = 0;
    
    if(empty($_POST['name-th'])) {
        $_SESSION['log-name-th'] = "กรุณาป้อนชื่อสถานประกอบการ";
        $error_n++;
    }else if(!empty($_POST['name-th'])) {
        $_SESSION['name-th'] = $_POST['name-th'];
    }
    
    if(empty($_POST['email'])) {
        $_SESSION['log-email'] = "กรุณาป้อนอีเมลติดต่อ";
        $error_n++;
    }else if(!empty($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }
    
    if(empty($_POST['tel'])) {
        $_SESSION['log-tel'] = "กรุณาป้อนเบอร์โทรติดต่อ";
        $error_n++;
    }else if(!empty($_POST['tel'])) {
        $_SESSION['tel'] = $_POST['tel'];
    }

    if(empty($_POST['address'])) {
        $_SESSION['log-address'] = "กรุณาป้อนรายละเอียดที่อยู่";
        $error_n++;
    }else if(!empty($_POST['address'])) {
        $_SESSION['address'] = $_POST['address'];
    }

    if(empty($_POST['sub-district'])) {
        $_SESSION['log-sub-district'] = "กรุณาป้อนชื่อตำบล";
        $error_n++;
    }else if(!empty($_POST['sub-district'])) {
        $_SESSION['sub-district'] = $_POST['sub-district'];
    }

    if(empty($_POST['district'])) {
        $_SESSION['log-district'] = "กรุณาป้อนชื่ออำเภอ";
        $error_n++;
    }else if(!empty($_POST['district'])) {
        $_SESSION['district'] = $_POST['district'];
    }

    if(empty($_POST['province'])) {
        $_SESSION['log-province'] = "กรุณาป้อนชื่อจังหวัด";
        $error_n++;
    }else if(!empty($_POST['province'])) {
        $_SESSION['province'] = $_POST['province'];
    }
    
    if(empty($_POST['zipcode'])) {
        $_SESSION['log-zipcode'] = "กรุณาป้อนรหัสไปรษณีย์";
        $error_n++;
    }else if(!empty($_POST['zipcode'])) {
        $_SESSION['zipcode'] = $_POST['zipcode'];
    }

    if($error_n == 0) {
        if(isset($_SESSION['update_state'])) {
            header('location: updateprofile.php');
        }else {
            $_SESSION['profile_state'] = "Ok";
            header('location: ../registeraccount.php');
        }
        // echo $error_n;
    }else {
        // echo $error_n;
        
        header('location: ../enterprofile.php');
    }

?>