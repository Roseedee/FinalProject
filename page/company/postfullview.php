<?php
    session_start();
    include('../../config/server.php');
    $post_id = 0;
    $sql = null;
    if(isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $sql = "SELECT concat(company.cp_nameth, '(', company.cp_nameeng, ')') as company_name, concat(address_company.ad_address, ', ', address_company.ad_sub_district, ', ', address_company.ad_district, ', ', address_company.ad_province, ', ', address_company.ad_zipcode) as company_address, post.* from company JOIN address_company on address_company.ad_id=company.cp_id JOIN post on post.cp_id=company.cp_id WHERE post.p_id='$post_id';";
        try {
            $stmt = $con->query($sql);
            $stmt->execute();
            $row = $stmt->fetch();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include style fille -->
    <link rel="stylesheet" href="style/postfullview.css">
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
                <?php 
                    if(isset($_SESSION['user_type'])) {
                        if($_SESSION['user_type'] == 1) {
                            echo '<a href="../student/profile.php"><img class="account-menu-student" src="../../pictures/Icon/user_icon.png" alt=""></a>';
                        }else if($_SESSION['user_type'] == 2){
                            echo '<a href="../company/profile.php"><img class="account-menu-company" src="../../pictures/Icon/building.png" alt=""></a>';
                        }
                    }else {
                        echo '<a href="../company/enterprofile.php" class="menu-forcompany">สำหรับสถานประกอบการ</a>
                        <a href="../../login.php">เข้าสู่ระบบ</a>
                        <a href="enterprofile.php" class="menu-register">ลงทะเบียน</a>';
                    }
                ?>
            </div>
        </div>
    </header>
    <!-- conntent -->
    <div class="content">
        <div class="title">
            <p>โพสต์</p>
        </div>
        <div class="content-profile">
            <div class="sub-content-profile user-img-container">
                <div class="logo">
                    <img src="../../pictures/Icon/building.gif" alt="">
                </div>
                <div class="another">
                    <p class="company-name"><?php echo $row['company_name'];?></p>
                    <div class="picture-company">
                        <img src="../../pictures/Icon/gallery.png" alt="">
                    </div>
                </div>
            </div>
            <hr width="100%" style="margin-top: 10px">
            <div class="con-menu">
                
                <?php
                    if(isset($_SESSION['user_type'])) {
                        if($_SESSION['user_type'] == 2 && $_SESSION['user_id'] == $row['cp_id']) {
                            echo '
                                <a href="updatepost.php?post-id='.$row['p_id'].'" class="submit">แก้ใขโพสต์</a>
                                <a href="php/deletepost.php?post-id='.$row['p_id'].'" class="submit">ลบโพสต์</a>
                            ';
                        //ผู้ใช้เป็นนักเรียนหรือเป็นสถานประกอบการแต่ไม่ใช่เจ้าของ
                        }else if($_SESSION['user_type'] == 1 || ($_SESSION['user_type'] == 2 && $_SESSION['user_id'] != $row['cp_id'])) {
                            echo '<a href="profile.php?user-view=1&company-id='.$row['cp_id'].'" class="submit">เข้าชมสถานประกอบการ</a>';
                        }
                    }else {
                        echo '<a href="profile.php?user-view=1&company-id='.$row['cp_id'].'" class="submit">เข้าชมสถานประกอบการ</a>';
                    }
                ?>
            </div>
            <div class="container-post">
                <div class="post">
                    <div class="icon-company">
                        <img src="../../pictures/Icon/building.gif" alt="">
                    </div>
                    <div class="content-post">
                        <p class="title-post"><?php echo $row['p_title'];?></p>
                        <div class="about-company">
                            <img src="../../pictures/Icon/flat.png" alt="">
                            <span><?php echo $row['company_name'];?></span>
                        </div>
                        <div class="about-company">
                            <img src="../../pictures/Icon/location.png" alt="">
                            <span><?php echo $row['company_address'];?></span>
                        </div>
                        <p class="details">
                            <?php echo $row['p_details'];?>
                        </p>
                    </div>
                </div>
                <div class="container-post-date">
                    <p class="post-date"><?php echo $row['p_date'];?></p>
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