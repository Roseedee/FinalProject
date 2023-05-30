<?php
    session_start();
    include('../../config/server.php');
    if(!isset($_SESSION['login_state']) || $_SESSION['user_type'] != 1) {
        echo("<script>location.href = '../../login.php';</script>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include style fille -->
    <link rel="stylesheet" href="style/quiz.css">
    <!-- include icon title page -->
    <link rel="icon" href="../../pictures/Icon/icon_logo.png">
    <title>MyInternship</title>
</head> 
<body>
<header class="header">
        <div class="navbar">
            <div class="logo">
                <a href="dashboard.php"><img src="../../pictures/Icon/Logo/logoSTD.png" alt="logo"></a>
            </div>
            <div class="main-menu">
                <a href="dashboard.php" class="icon-home"><img src="../../pictures/Icon/home.png" alt="icon home"></a>
                <a href="#">ที่ฝึกงานทั้งหมด</a>
                <a href="#">ทำแบบทดสอบ</a>
                <a href="profile.php"><img class="account-menu" src="../../pictures/Icon/user_icon.png" alt=""></a>
            </div>
        </div>
    </header>
    <!-- conntent -->
    <div class="content">
        <div class="banner">
            <img src="../../pictures/Image/banner-quiz.jpg" alt="">
        </div>
        <p class="title-quiz">แบบทดสอบเพื่อประเมินศักยภาพของคุณเป็นส่วนหนึ่งของระบบ FIs</p>
        <div class="container-quiz">
            <hr width="100%">
            <p class="log">
                <?php
                    if(isset($_SESSION['quiz-log'])) {
                        echo $_SESSION['quiz-log'];
                        unset($_SESSION['quiz-log']);
                    }
                ?>
            </p>
            <form action="php/check_quiz.php" method="post" class="form-quiz">
                <?php
                    include('php/load_quiz.php')
                ?>
                <input type="submit" value="ส่ง" class="submit">
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