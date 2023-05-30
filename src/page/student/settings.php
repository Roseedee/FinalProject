<?php
    session_start();
    $user_id = '0';
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include style fille -->
    <link rel="stylesheet" href="style/settings.css">
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
        <div class="title">
            <div>
                <a href="profile.php"><div class="btn-prev">
                    <img src="../../pictures/Icon/prev.png" alt="">
                </div></a>
                <p>ตั่งค่าบัญชี</p>
            </div>
        </div>
        <div class="content-settings">
            <div class="section-menu" id="section-menu1">
                <p class="section-title">การตั้งค่าทั่วไป</p>
                <hr width="100%">
                <div class="section">
                    <table>
                        <tr>
                            <td>ลบบัญชีผู้ใช้ของคุณ</td>
                            <td  align="right" colspan="2">
                                <?php
                                    // 
                                    echo '<a href="php/deleteaccount.php?user-id='.$user_id.'" >ลบ</a>';
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
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
    <script src="script/settings.js"></script>
</body>
</html>