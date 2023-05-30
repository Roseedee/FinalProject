<?php
    session_start();
    include('../../../config/server.php');

    $name_th = $_SESSION['name-th'];
    $name_eng = $_SESSION['name-eng'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $details = $_SESSION['details'];

    //get address 
    $address = $_SESSION['address'];
    $sub_district = $_SESSION['sub-district'];
    $district = $_SESSION['district'];
    $province = $_SESSION['province'];
    $zipcode = $_SESSION['zipcode'];

    //for account
    $username = $_POST['username'];

    $password = $_POST['password'];
    $confirm_password = $_POST['password-confirm'];
    

    $last_id = 0;

    // $sql_insert_data_account = "insert into account values (NULL, '$username', '$password', NULL, 2);";
    
    // try {
    //     $con->exec($sql_insert_data_account);
    //     $last_id = $con->lastInsertId();
    //     $sql_insert_data_person = "insert into company values ('$last_id', '$name_th', '$name_eng', '$email', '$tel', '$job_details');";
    //     if($con->exec($sql_insert_data_person) == true) {
    //         $sql_insert_data_address = "insert into address_company values ('$last_id', '$address', '$sub_district', '$district', '$province', '$zipcode');";
    //         $con->exec($sql_insert_data_address);
    //         $_SESSION['login_state'] = "Successfully";
    //         $_SESSION['user_id'] = $last_id;
    //         header("location: ../profile.php");
    //     }
    // }catch(PDOException $e) {
    //     echo "Error ". $e->getMessage();
    // }

    try {
        $sql_check_username = "Select username from account where username='$username'";
        $stmt_check_username = $con->query($sql_check_username);
        $stmt_check_username->execute();
        // echo $stmt_check_username->rowCount();
        if($stmt_check_username->rowCount() > 0) {
            $_SESSION['log-username'] = "บัญชีผู้ชายนี้มีแล้วในระบบ <a href='../../login.php'>กดที่นี้เพื่อเข้าสู่ระบบ</a>";
            header('location: ../registeraccount.php');
        }else {
            $_SESSION['username'] = $username;
            if($password != $confirm_password) {
                $_SESSION['log-password'] = "รหัสผ่านไม่ตรงกัน";
                header('location: ../registeraccount.php');
            }else {
                $sql_insert_data_account = "insert into account values (NULL, '$username', '$password', NULL, 2);";
                $con->exec($sql_insert_data_account);
                $last_id = $con->lastInsertId();
                $sql_insert_data_person = "insert into company values ('$last_id', '$name_th', '$name_eng', '$email', '$tel', '$details');";
                if($con->exec($sql_insert_data_person) == true) {
                    $sql_insert_data_address = "insert into address_company values ('$last_id', '$address', '$sub_district', '$district', '$province', '$zipcode');";
                    $con->exec($sql_insert_data_address);
                    $_SESSION['login_state'] = "Successfully";
                    $_SESSION['user_id'] = $last_id;
                    header("location: ../profile.php");
                }
            }
        }

    }catch(PDOException $e) {
        echo $e->getMessage();
    }



?>