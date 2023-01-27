<?php
    session_start();
    include('../../../config/server.php');
    
    $name_th = $_SESSION['name-th'];
    $name_eng = $_SESSION['name-eng'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $details = $_SESSION['details'];
    //data for address
    $address = $_SESSION['address'];
    $sub_district = $_SESSION['sub-district'];
    $district = $_SESSION['district'];
    $province = $_SESSION['province'];
    $zipcode = $_SESSION['zipcode'];
    
    $sql = "
        update company set cp_nameth='$name_th', cp_nameeng='$name_eng', cp_email='$email', cp_tel='$tel', cp_jobdetails='$details'  where cp_id='$_SESSION[user_id]';
        update address_company set ad_address='$address', ad_sub_district='$sub_district', ad_district='$district', ad_province='$province', ad_zipcode='$zipcode' where ad_id='$_SESSION[user_id]';
    ";
    try {
        $con->exec($sql);
        header('location: ../profile.php');
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    
?>