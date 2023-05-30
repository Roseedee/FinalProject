<?php
    session_start();
    include('../../../config/server.php');
    
    $pname = $_SESSION['pname'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $sex = ($pname == "นาย") ? "1" : "0";
    $birthday = $_SESSION['birthday'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $academy = $_SESSION['academy'];
    $education_level = $_SESSION['education-level'];
    $major = $_SESSION['major'];
    //data for address
    $address = $_SESSION['address'];
    $sub_district = $_SESSION['sub-district'];
    $district = $_SESSION['district'];
    $province = $_SESSION['province'];
    $zipcode = $_SESSION['zipcode'];
    
    $sql = "update student set st_pname='$pname', st_fname='$fname', st_lname='$lname', st_sex='$sex', st_email='$email', st_tel='$tel', st_academy='$academy', st_education_lv='$education_level', mj_id='$major' where st_id='$_SESSION[user_id]';";
    try {
        $con->exec($sql);
        header('location: ../profile.php');
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    
?>