<?php 
    session_start();
    include('../../config/server.php');
    if(isset($_GET['user_id'])) {
        $stmt = $con->query("Select student.*, address_student.* from student JOIN address_student on address_student.ad_id=student.st_id WHERE student.st_id='$_GET[user_id]';");
        $stmt->execute();
        $row = $stmt->fetch();
        $_SESSION['fname'] = $row['st_fname'];
        $_SESSION['lname'] = $row['st_lname'];
        $_SESSION['birthday'] = $row['st_birthday'];
        $_SESSION['email'] = $row['st_email'];
        $_SESSION['tel'] = $row['st_tel'];
        $_SESSION['address'] = $row['ad_address'];
        $_SESSION['sub-district'] = $row['ad_sub_district'];
        $_SESSION['district'] = $row['ad_district'];
        $_SESSION['province'] = $row['ad_province'];
        $_SESSION['zipcode'] = $row['ad_zipcode'];
        $_SESSION['academy'] = $row['st_academy'];
        
        $_SESSION['update_state'] = "Update";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include style file -->
    <link rel="stylesheet" href="style/enterprofile.css">
    <link rel="icon" href="../../pictures/Icon/icon_logo.png">
    <title>MyInternship</title>
</head> 
<body>
<header class="header">
        <div class="navbar">
            <div class="logo">
                <a href="../../index.php"><img src="../../pictures/Icon/Logo/logoSTD.png" alt="logo"></a>
            </div>
            <div class="main-menu">
                <a href="../../index.php" class="icon-home"><img src="../../pictures/Icon/home.png" alt="icon home"></a>
                <a href="../../index.php">ที่ฝึกงานทั้งหมด</a>
                <a href="quiz.php">ทำแบบทดสอบ</a>
                <?php 
                    if(isset($_SESSION['user_type'])) {
                        echo '<a href="profile.php"><img class="account-menu-student" src="../../pictures/Icon/user_icon.png" alt=""></a>';
                    }else {
                        echo '<a href="../company/enterprofile.php" class="menu-forcompany">สำหรับสถานประกอบการ</a>
                        <a href="../../login.php">เข้าสู่ระบบ</a>';
                    }
                ?>
            </div>
        </div>
    </header>
    <!-- conntent -->
    <div class="content content-enterprofile">
        <div class="title">
            <p>
                <?php
                    if(isset($_GET['user_id'])) {
                        echo "แก้ไขข้อมูล";
                    }else {
                        echo "ลงทะเบียนสำหรับนักศึกษา";
                    }
                ?>    
            </p>
        </div>
        <div class="form-input">
            <form action="php/check_enterprofile.php" method="POST">
                <span>ประวัติส่วนตัว</span>
                <div class="input-group">
                    <div class="input-section"> 
                        <select name="pname" class="input" >
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                    </div>
                    <div class="input-section" style="flex-grow: 3;">
                        <input class="input" type="text" name="fname" placeholder="ชื่อ(first name)" value="<?php if(isset($_SESSION['fname'])){ echo $_SESSION['fname']; unset($_SESSION['fname']);} ?>">
                        <p class="log">
                            <?php 
                                if(isset($_SESSION['log-fname'])) {
                                    echo $_SESSION['log-fname'];
                                    unset($_SESSION['log-fname']);
                                }
                            ?>
                        </p>
                    </div>
                    <div class="input-section" style="flex-grow: 3;">
                        <input class="input" type="text" name="lname" placeholder="นามสกุล(last name)" value="<?php if(isset($_SESSION['lname'])){ echo $_SESSION['lname']; unset($_SESSION['lname']);} ?>">
                        <p class="log">
                            <?php 
                                if(isset($_SESSION['log-lname'])) {
                                    echo $_SESSION['log-lname'];
                                    unset($_SESSION['log-lname']);
                                }
                            ?>
                        </p>
                    </div>
                    <div class="input-section">
                        <input class="input" type="date" name="birthday" placeholder="วันเกิด" value="<?php if(isset($_SESSION['birthday'])){ echo $_SESSION['birthday']; unset($_SESSION['birthday']);} ?>">
                        <p class="log">
                            <?php 
                                if(isset($_SESSION['log-birthday'])) {
                                    echo $_SESSION['log-birthday'];
                                    unset($_SESSION['log-birthday']);
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <span>ส่วนติดต่อ</span>
                <div class="input-group">
                    <div class="input-section" style="flex-grow: 2;">
                        <input class="input" type="text" name="email" placeholder="อีเมลล์ติดต่อ" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; unset($_SESSION['email']);} ?>">
                        <p class="log">
                            <?php 
                                if(isset($_SESSION['log-email'])) {
                                    echo $_SESSION['log-email'];
                                    unset($_SESSION['log-email']);
                                }
                            ?>
                        </p>
                    </div>
                    <div class="input-section">
                        <input class="input" type="text" name="tel" placeholder="เบอร์ติดต่อ" value="<?php if(isset($_SESSION['tel'])){ echo $_SESSION['tel']; unset($_SESSION['tel']);} ?>">
                        <p class="log">
                            <?php 
                                if(isset($_SESSION['log-tel'])) {
                                    echo $_SESSION['log-tel'];
                                    unset($_SESSION['log-tel']);
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <span>ที่อยู่ปัจจุบัน</span>
                <div class="input-group" style="display: flex; flex-direction: column;">
                    <div class="input-section">
                        <input class="input" type="text" name="address" placeholder="รายละเอียดที่อยู่" value="<?php if(isset($_SESSION['address'])){ echo $_SESSION['address']; unset($_SESSION['address']);} ?>">
                        <p class="log">
                            <?php 
                                if(isset($_SESSION['log-address'])) {
                                    echo $_SESSION['log-address'];
                                    unset($_SESSION['log-address']);
                                }
                            ?>
                        </p>
                    </div>
                    <div class="input-section" style="display: flex; flex-direction: row; flex-wrap: wrap;">
                        <div class="sub-input">
                            <input class="input" type="text" name="sub-district" placeholder="ตำบล/แขวน" value="<?php if(isset($_SESSION['sub-district'])){ echo $_SESSION['sub-district']; unset($_SESSION['sub-district']);} ?>">
                            <p class="log">
                                <?php 
                                    if(isset($_SESSION['log-sub-district'])) {
                                        echo $_SESSION['log-sub-district'];
                                        unset($_SESSION['log-sub-district']);
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="sub-input">
                            <input class="input" type="text" name="district" placeholder="อำเภอ/เขต" value="<?php if(isset($_SESSION['district'])){ echo $_SESSION['district']; unset($_SESSION['district']);} ?>">
                            <p class="log">
                                <?php 
                                    if(isset($_SESSION['log-district'])) {
                                        echo $_SESSION['log-district'];
                                        unset($_SESSION['log-district']);
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="sub-input">
                            <input class="input" type="text" name="province" placeholder="จังหวัด" value="<?php if(isset($_SESSION['province'])){ echo $_SESSION['province']; unset($_SESSION['province']);} ?>">
                            <p class="log">
                                <?php 
                                    if(isset($_SESSION['log-province'])) {
                                        echo $_SESSION['log-province'];
                                        unset($_SESSION['log-province']);
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="sub-input">
                            <input class="input" type="text" name="zipcode" placeholder="รหัสไปรษณีย์" value="<?php if(isset($_SESSION['zipcode'])){ echo $_SESSION['zipcode']; unset($_SESSION['zipcode']);} ?>">
                            <p class="log">
                                <?php 
                                    if(isset($_SESSION['log-zipcode'])) {
                                        echo $_SESSION['log-zipcode'];
                                        unset($_SESSION['log-zipcode']);
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <span>การศึกษา</span>
                <div class="input-group">
                    <div class="input-section" style="flex-grow: 3;">
                        <input class="input" type="text" name="academy" placeholder="สถานศึกษาปัจจุบัน" value="<?php if(isset($_SESSION['academy'])){ echo $_SESSION['academy']; unset($_SESSION['academy']);} ?>">
                        <p class="log">
                            <?php 
                                if(isset($_SESSION['log-academy'])) {
                                    echo $_SESSION['log-academy'];
                                    unset($_SESSION['log-academy']);
                                }
                            ?>
                        </p>
                    </div>
                    <div class="input-section">
                        <select class="input" name="education-level" onchange="selectchange(this.value)">
                            <option value="0">ปวช.</option>
                            <option value="1">ปวส.</option>
                        </select>
                        <script>
                            function selectchange(str) {
                                // window.alert(str);
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function() {
                                    document.getElementById("major-option").innerHTML = this.responseText;
                                }
                                xhttp.open("GET", "php/getmajor.php?select="+str);
                                xhttp.send();
                            }
                        </script>
                    </div>
                    <div class="input-section">
                        <select class="input" name="major" id="major-option"></select>
                    </div>
                </div>
                
                <div class="box-submit">
                    <input type="submit" value="<?php if(isset($_GET['user_id'])) { echo "บันทึก"; }else { echo "ถัดไป"; } ?>">
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="container-footer">
            <div class="col-first">
                <div class="row">
                    <img src="../../pictures/Icon/Logo/logoSTD.png" alt="">
                </div>
                <div class="row">
                    <p>MyInternship คือ เว็บไซต์ที่จะแนะนำสถานที่ฝึกงาน ให้กับนักเรียนนักศึกษา โดยจะให้นักเรียนนักศึกษาทำแบบทดสอบ เพื่อหาศักยภาพของตน และระบบ FIs จะแนะนำสถานที่ฝึกงานหลายๆ แห่งที่เหมาะสมให้กับนักเรียนนักศึกษา</p>
                </div>
                <div class="row">
                    <p>ระบบ FIs คือ เป็นระบบที่จะช่วยให้นักเรียนนักศึกษา ได้ที่ฝึกงานที่เหมาะสมกับศักยภาพ โดยจะใช้แบบทดสอบแล้วจะวิเคราะห์หาศักยภาพของนักเรียนนักศึกษา</p>
                </div>
            </div>
            <div class="line"></div>
            <div class="col-first">
                <div class="col">
                    <h3>สำหรับนักเรียนนักศึกษา</h3>
                    <a href="enterprofile.php">ลงทะเบียน</ฟ>
                    <a href="quiz.php">ทำแบบทดสอบ</a>
                </div>
                <div class="col">
                    <h3>สำหรับสถานประกอบการ</h3>
                    <a href="../company/enterprofile.php">ลงทะเบียน</a>
                    <a href="../company/createpost.php">ลงประกาศรับฝึกงาน</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>