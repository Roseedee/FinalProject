<?php 
    session_start();
    include('../../config/server.php');
    $company_id = 0;
    if(isset($_GET['user-view']) && isset($_GET['company-id'])) {
        $company_id = $_GET['company-id'];
    } else {
        if(isset($_SESSION['login_state'])) {
            $_SESSION['user_type'] = 2;
            $company_id = $_SESSION['user_id'];
        }else {
             echo("<script>location.href = '../../login.php';</script>");
        }
    }
    try {
        // get data about user
        $stsql =  "Select * from company where cp_id='$company_id'";
        $cpstmt = $con->query($stsql);
        $cpstmt->execute();
        $cprow = $cpstmt->fetch();
        $_SESSION['company-name'] = $cprow['cp_nameth'] . "(". $cprow['cp_nameeng'].")";
        
        //get address
        $adsql = "Select * from address_company where ad_id='$company_id'";
        $adstmt = $con->query($adsql);
        $adstmt->execute();
        $adrow = $adstmt->fetch();
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include style fille -->
    <link rel="stylesheet" href="style/profile.css">
    <!-- include icon title page -->
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
                        if($_SESSION['user_type'] == 1) {
                            echo '<a href="../student/profile.php"><img class="account-menu-student" src="../../pictures/Icon/user_icon.png" alt=""></a>';
                        }else if($_SESSION['user_type'] == 2){
                            echo '<a href="profile.php"><img class="account-menu-company" src="../../pictures/Icon/building.png" alt=""></a>';
                        }
                    }else {
                        echo '<a href="enterprofile.php" class="menu-forcompany">สำหรับสถานประกอบการ</a>
                        <a href="../../login.php">เข้าสู่ระบบ</a>
                        <a href="../student/enterprofile.php" class="menu-register">ลงทะเบียน</a>';
                    }
                ?>
            </div>
        </div>
    </header>
    <!-- conntent -->
    <div class="content">
        <div class="title">
            <p>โปรไฟล์ของฉัน</p>
            <div class="sub-menu">
                <?php
                    if(!(isset($_GET['user-view']) && isset($_GET['company-id']))) {
                        // echo $_GET['user-view'];
                        echo '<a href="enterprofile.php?user_id='. $_SESSION['user_id'] .'"><div class="icon-sub-menu"><img src="../../pictures/Icon/edit.png" alt=""></div><span>แก้ไขข้อมูล</span></a>
                        <a href="settings.php?user_id='. $_SESSION['user_id'] .'"><div class="icon-sub-menu"><img src="../../pictures/Icon/setting.png" alt=""></div><span>ตังค่าบัญชี</span></a>
                        <a href="php/logout.php"><div class="icon-sub-menu"><img src="../../pictures/Icon/logout.png" alt=""></div><span>ออกจากระบบ</span></a>
                        ';                        
                    }
                ?>
            </div>
        </div>
        <div class="content-profile">
            <div class="sub-content-profile user-img-container">
                <div class="logo">
                    <img src="../../pictures/Icon/building.gif" alt="">
                </div>
                <div class="another">
                    <!-- get company name thai and english -->
                    <p class="company-name"><?php 
                        echo $cprow['cp_nameth'] . " (" . $cprow['cp_nameeng'] . ")";
                    ?></p>
                    <div class="picture-company">
                        <img src="../../pictures/Icon/gallery.png" alt="">
                    </div>
                </div>
            </div>
            <hr width="100%">
            <div class="sub-content-profile">
                <p class="sub-content-title">ข้อมูลสถานประกอบการ</p>
                <table>
                    <tr>
                        <td class="col1">ชื่อสถานประกอบการ(Th)</td>
                        <td class="col2"><?php 
                            echo $cprow['cp_nameth'];
                        ?></td>
                    </tr>
                    <tr>
                        <td class="col1">ชื่อสถานประกอบการ(En)</td>
                        <td class="col2"><?php 
                            echo $cprow['cp_nameeng'];
                        ?></td>
                    </tr>
                    <tr>
                        <td class="col1">เบอร์ติดต่อ</td>
                        <td class="col2"><?php 
                            echo $cprow['cp_tel'];
                        ?></td>
                    </tr>
                    <tr>
                        <td class="col1">อีเมลล์</td>
                        <td class="col2"><?php 
                            echo $cprow['cp_email'];
                        ?></td>
                    </tr>
                </table>
            </div>
            <div class="sub-content-profile">
                <p class="sub-content-title">ที่อยู่</p>
                <table>
                    <tr>
                        <td class="col1">ที่อยู่</td>
                        <td class="col2"><?php 
                            echo $adrow['ad_address'];
                        ?></td>
                    </tr>
                    <tr>
                        <td class="col1">ตำบล</td>
                        <td class="col2"><?php 
                            echo $adrow['ad_sub_district'];
                        ?></td>
                    </tr>
                    <tr>
                        <td class="col1">อำเภท</td>
                        <td class="col2"><?php 
                            echo $adrow['ad_district'];
                        ?></td>
                    </tr>
                    <tr>
                        <td class="col1">จังหวัด</td>
                        <td class="col2"><?php 
                            echo $adrow['ad_province'];
                        ?></td>
                    </tr>
                    <tr>
                        <td class="col1">รหัสไปรษณีย์</td>
                        <td class="col2"><?php 
                            echo $adrow['ad_zipcode'];
                        ?></td>
                    </tr>
                </table>
            </div>
            <div class="sub-content-profile" style="width: 100%;">
                <p class="sub-content-title">รายละเอียดเกี่ยวสถานประกอบการ</p>
                <div class="job-details">
                    <?php 
                        echo $cprow['cp_jobdetails'];
                    ?>
                </div>
            </div>
            <div class="sub-content-profile" style="width: 100%;">
                <p class="sub-content-title">โพสต์ที่ฝึกงาน</p>
                <?php
                    $stmt_load_post = $con->query("Select * from post where cp_id='$company_id'");
                    if($stmt_load_post->execute()) {
                        $stmt_load_post->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($stmt_load_post as $row) {
                            echo '
                                <a href="postfullview.php?post_id='. $row['p_id'] .'">
                                    <div class="container-post">
                                        <div class="post">
                                            <div class="icon-company">
                                                <img src="../../pictures/Icon/building.gif" alt="">
                                            </div>
                                            <div class="content-post">
                                                <p class="title-post">'.$row['p_title'].'</p>
                                                <div class="about-company">
                                                    <img src="../../pictures/Icon/flat.png" alt="">
                                                    <span>'.$_SESSION['company-name'].'</span>
                                                </div>
                                                <div class="about-company">
                                                    <img src="../../pictures/Icon/location.png" alt="">
                                                    <span>คอมพิวเตอร์ ชิป(MyComputer ship)</span>
                                                </div>
                                                <p class="details">
                                                    รายละเอียด : '. $row['p_details'] .'
                                                </p>
                                            </div>
                                        </div>
                                        <div class="container-post-date">
                                            <p class="post-date">'. $row['p_date'] .'</p>
                                        </div>
                                    </div> 
                                </a>
                            ';
                        }
                    }
                    if(!(isset($_GET['user-view']) && isset($_GET['company-id']))) {
                        echo '
                            <a href="createpost.php">
                                <div class="add-post">
                                    <img src="../../pictures/Icon/plus.png" alt="">
                                </div>
                            </a>
                        ';
                    }
                ?>
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
    <script src="script/profile.js"></script>
</body>
</html>