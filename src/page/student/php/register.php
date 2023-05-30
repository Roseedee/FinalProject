<?php 
    session_start();
    include('../../../config/server.php');

    //data for person
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
    //data for account
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password-confirm'];
    
    $last_id = 0;
    
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
                $sql_insert_data_account = "insert into account values (NULL, '$username', '$password', NULL, 1);";
                $con->exec($sql_insert_data_account);
                $last_id = $con->lastInsertId();
                $sql_insert_data_person = "insert into student values ('$last_id', '$pname', '$fname', '$lname', '$sex', '$birthday', '$email', '$tel', '$academy', '$education_level', '$major');";
                if($con->exec($sql_insert_data_person) == true) {
                    $sql_insert_data_address = "insert into address_student values ('$last_id', '$address', '$sub_district', '$district', '$province', '$zipcode');";
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