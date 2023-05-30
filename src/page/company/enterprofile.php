<?php
    session_start();
    include('../../config/server.php');
    if(isset($_GET['user_id'])) {
        $stmt = $con->query("Select company.*, address_company.* from company JOIN address_company on address_company.ad_id=company.cp_id WHERE company.cp_id='$_GET[user_id]';");
        $stmt->execute();
        $row = $stmt->fetch();
        $_SESSION['name-th'] = $row['cp_nameth'];
        $_SESSION['name-eng'] = $row['cp_nameeng'];
        $_SESSION['email'] = $row['cp_email'];
        $_SESSION['tel'] = $row['cp_tel'];
        $_SESSION['details'] = $row['cp_jobdetails'];
        $_SESSION['address'] = $row['ad_address'];
        $_SESSION['sub-district'] = $row['ad_sub_district'];
        $_SESSION['district'] = $row['ad_district'];
        $_SESSION['province'] = $row['ad_province'];
        $_SESSION['zipcode'] = $row['ad_zipcode'];
        
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
                <?php 
                    if(isset($_SESSION['user_type'])) {
                        echo '<a href="enterprofile.php" class="menu-register">ลงทะเบียน</a>
                        <a href="../company/profile.php"><img class="account-menu-company" src="../../pictures/Icon/building.png" alt=""></a>';
                    }else {
                        echo '<a href="../../login.php">เข้าสู่ระบบ</a>
                        <a href="../student/enterprofile.php" class="menu-register">ลงทะเบียน</a>';
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
                        echo "ลงทะเบียนสำหรับสถานประกอบการ";
                    }
                ?>    
            </p>
        </div>
        <div class="form-input">
            <form action="php/checkenterprofile.php" method="POST">
                <span>ชื่อสถานประกอบการ</span>
                <div class="input-group">
                    <div class="input-section">
                        <input class="input" type="text" name="name-th" placeholder="ชื่อสถานประกอบการ(th)" value="<?php if(isset($_SESSION['name-th'])) { echo $_SESSION['name-th']; unset($_SESSION['name-th']); } ?>">
                        <p class="log">
                            <?php
                                if(isset($_SESSION['log-name-th'])) {
                                    echo $_SESSION['log-name-th'];
                                    unset($_SESSION['log-name-th']);
                                }
                            ?>
                        </p>
                    </div>
                    <div class="input-section">
                        <input class="input" type="text" name="name-eng" placeholder="ชื่อสถานประกอบการ(eng)" value="<?php if(isset($_SESSION['name-eng'])) { echo $_SESSION['name-eng']; unset($_SESSION['name-eng']); } ?>">
                    </div>
                </div>
                <span>ส่วนติดต่อ</span>
                <div class="input-group">
                    <div class="input-section input-email">
                        <input class="input" type="text" name="email" placeholder="ที่อยู่อีเมล์" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; unset($_SESSION['email']); } ?>">
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
                        <input class="input" type="text" name="tel" placeholder="เบอร์โทรศัพท์" value="<?php if(isset($_SESSION['tel'])) { echo $_SESSION['tel'];  unset($_SESSION['tel']); } ?>">
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
                <span>เกี่ยวกับสถานที่ประกอบการ</span>
                <div class="container-input-preview">
                    <div class="input-section input-text-area">
                        <textarea id="edit-preview" name="details" class="input" rows="10"  onkeydown="textarea()" placeholder="รายละเอียดของงาน"><?php if(isset($_SESSION['details'])) { echo $_SESSION['details'];  unset($_SESSION['details']);  } ?></textarea>
                        <p class="log">สามารถใช้ HMTL หรือ CSS ในการปรับแต่งต่างๆ ได้</p>
                    </div>
                    <div class="input-section">
                        <p class="log">preview</p>
                        <p id="preview"></p>
                    </div>
                </div>
                
                <span>ที่อยู่สถานประกอบการ</span>
                <div class="input-group" style="display: flex; flex-direction: column;">
                    <div class="input-section">
                        <input class="input" type="text" name="address" placeholder="รายละเอียดที่อยู่" value="<?php if(isset($_SESSION['address'])) { echo $_SESSION['address']; unset($_SESSION['address']); } ?>">
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
                            <input class="input" type="text" name="sub-district" placeholder="ตำบล/แขวน" value="<?php if(isset($_SESSION['sub-district'])) { echo $_SESSION['sub-district']; unset($_SESSION['sub-district']); } ?>">
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
                            <input class="input" type="text" name="district" placeholder="อำเภอ/เขต" value="<?php if(isset($_SESSION['district'])) { echo $_SESSION['district']; unset($_SESSION['district']); } ?>">
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
                            <input class="input" type="text" name="province" placeholder="จังหวัด" value="<?php if(isset($_SESSION['province'])) { echo $_SESSION['province']; unset($_SESSION['province']); } ?>">
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
                            <input class="input" type="text" name="zipcode" placeholder="รหัสไปรษณีย์" value="<?php if(isset($_SESSION['zipcode'])) { echo $_SESSION['zipcode']; unset($_SESSION['zipcode']); } ?>">
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
                    <a href="../student/enterprofile.php">ลงทะเบียน</ฟ>
                    <a href="../student/quiz.php">ทำแบบทดสอบ</a>
                </div>
                <div class="col">
                    <h3>สำหรับสถานประกอบการ</h3>
                    <a href="enterprofile.php">ลงทะเบียน</a>
                    <a href="createpost.php">ลงประกาศรับฝึกงาน</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        let editor = document.getElementById('edit-preview');
        let preview = document.getElementById('preview');
        function textarea() {
            preview.innerHTML = editor.value;
        }
    </script>
</body>
</html>