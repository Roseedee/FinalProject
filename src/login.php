<?php
    session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="pictures/Icon/icon_logo.png">
    <title>MyInternship</title>
</head> 
<body>
    <header class="header">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="pictures/Icon/Logo/logoSTD.png" alt="logo"></a>
            </div>
            <div class="main-menu">
                <a href="index.php" class="icon-home"><img src="pictures/Icon/home.png" alt="icon home"></a>
                <a href="page/student/dashboard.php">ที่ฝึกงานทั้งหมด</a>
                <a href="page/company/enterprofile.php" class="menu-forcompany">สำหรับสถานประกอบการ</a>
                <a href="page/student/enterprofile.php" class="menu-register">ลงทะเบียน</a>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="content">
            <div class="img">
                <img src="pictures/Image/img_login.jpg" alt="">
            </div>
            <div class="form-input">
                <p class="title">Login</p>
                <form action="php/signin.php" method="post">
                    <div class="input-group">
                        <div class="icon icon-front">
                            <img src="pictures/Icon/user.png" alt="">
                        </div>
                        <input type="text" id="username" class="username" name="username" placeholder="อีเมลล์หรือเบอร์โทร">
                        <div class="icon icon-end" onclick="_clear(0)">
                            <img src="pictures/Icon/cancel.png" alt="">
                        </div>
                    </div>
                    <p class="log">
                        <?php
                            if(isset($_SESSION['log-signin'])) {
                                echo $_SESSION['log-signin'];
                                unset($_SESSION['log-signin']);
                            }
                        ?>
                    </p>
                    <div class="input-group">
                        <div class="icon icon-front">
                            <img src="pictures/Icon/lock.png" alt="">
                        </div>
                        <input type="password" class="password" name="password" placeholder="รหัสผ่าน">
                        <div class="icon icon-end" onclick="showAndHidepsw(0)">
                            <img class="iconlookpsw" src="pictures/Icon/show.png" alt="">
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="submit" class="submit" value="เข้าสู่ระบบ">
                    </div>
                    <p class="register"><a href="page/student/enterprofile.php">กดที่นี้</a> ถ้ายังไม่มีบัญชี</p>
                </form>
            </div>
        </div>
    </div>
    <script src="script/input_password.js"></script>
</body>
</html>
