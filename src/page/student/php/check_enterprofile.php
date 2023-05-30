<?php 
    session_start();
    $_SESSION['pname'] = $_POST['pname'];
    $_SESSION['education-level'] = $_POST['education-level'];
    $_SESSION['major'] = $_POST['major'];
    $error_n = 0;

    if(empty($_POST['fname'])) {
        $_SESSION['log-fname'] = "กรุณาป้อนชื่อของคุณ";
        $error_n++;
    }else if(!empty($_POST['fname'])) {
        $_SESSION['fname'] = $_POST['fname'];
    }

    if(empty($_POST['lname'])) {
        $_SESSION['log-lname'] = "กรุณาป้อนนามสกุลของคุณ";
        $error_n++;
    }else if(!empty($_POST['lname'])) {
        $_SESSION['lname'] = $_POST['lname'];
    }

    if(empty($_POST['birthday'])) {
        $_SESSION['log-birthday'] = "กรุณาเลือกวันเกิดของคุณ";
        $error_n++;
    }else if(!empty($_POST['birthday'])) {
        $_SESSION['birthday'] = $_POST['birthday'];
    }

    if(empty($_POST['email'])) {
        $_SESSION['log-email'] = "กรุณาป้อนอีเมลติดต่อของคุณ";
        $error_n++;
    }else if(!empty($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }
    
    if(empty($_POST['tel'])) {
        $_SESSION['log-tel'] = "กรุณาป้อนเบอร์ติดต่อของคุณ";
        $error_n++;
    }else if(!empty($_POST['tel'])) {
        $_SESSION['tel'] = $_POST['tel'];
    }
    
    if(empty($_POST['address'])) {
        $_SESSION['log-address'] = "กรุณาป้อนที่อยู่ของคุณ";
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
    
    if(empty($_POST['academy'])) {
        $_SESSION['log-academy'] = "กรุณาป้อนชื่อสถานบันของคุณปัจจุบัน";
        $error_n++;
    }else if(!empty($_POST['academy'])) {
        $_SESSION['academy'] = $_POST['academy'];
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