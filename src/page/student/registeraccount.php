<?php 
    session_start();
    if(!isset($_SESSION['profile_state'])) {
        header('location: enterprofile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/registeraccount.css">
    <script src="../../script/input_password.js"></script>
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
                <a href="../company/enterprofile.php" class="menu-forcompany">สำหรับสถานประกอบการ</a>
                <a href="../../login.php">เข้าสู่ระบบ</a>
            </div>
        </div>
    </header>
    <!-- conntent -->
    <div class="content content-register">
        <div class="title">
            <p>ลงทะเบียนสำหรับนักศึกษา</p>
        </div>
        <div class="form-input">
            <form action="php/register.php" method="POST">
                <span>สมัครบัญชี</span>
                <div class="input-section">
                    <div class="input-username">
                        <div class="icon-textbox">
                            <img src="../../pictures/Icon/user.png" alt="">
                        </div>
                        <input class="username" type="text" name="username" placeholder="อีเมลล์หรือเบอร์โทร" value="<?php if(isset($_SESSION['username'])) {echo $_SESSION['username']; }?>">
                    </div>
                    <p class="log">
                        <?php 
                            if(isset($_SESSION['log-username'])) {
                                echo $_SESSION['log-username'];
                                unset($_SESSION['log-username']);
                            }
                        ?>
                    </p>
                    <div class="input-password">
                        <div class="icon-textbox">
                            <img src="../../pictures/Icon/lock.png" alt="">
                        </div>
                        <input class="password" type="password" name="password" onkeydown="checkpassword()" placeholder="รหัสผ่าน">
                        <div class="icon-textbox icon-show" onclick="showAndHidepsw(0)">
                            <img class="iconlookpsw" src="../../pictures/Icon/show.png" alt="">
                        </div>
                    </div>
                    <!-- tab password level -->
                    <ul class="psw-level">
                        <li class="psw-level-tab"></li>
                        <li class="psw-level-tab"></li>
                        <li class="psw-level-tab"></li>
                        <li class="psw-level-tab"></li>
                    </ul>
                    <span>ยืนยันรหัสผ่าน</span>
                    <div class="input-password">
                        <div class="icon-textbox">
                            <img src="../../pictures/Icon/lock.png" alt="">
                        </div>
                        <input class="password password-confirm" type="password" name="password-confirm" onchange="checkpassword()" placeholder="รหัสผ่าน">
                        <div class="icon-textbox icon-show" onclick="showAndHidepsw(1)">
                            <img class="iconlookpsw" src="../../pictures/Icon/show.png" alt="">
                        </div>
                    </div>
                    <p class="log">
                        <?php 
                            if(isset($_SESSION['log-password'])) {
                                echo $_SESSION['log-password'];
                                unset($_SESSION['log-password']);
                            }
                        ?>
                    </p>
                </div>
                <div class="box-submit">
                    <input type="submit" value="ลงทะเบียน">
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