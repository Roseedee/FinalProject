<?php
    session_start();
    include('config/server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
                <a href="page/student/quiz.php">ทำแบบทดสอบ</a>
                <?php 
                    if(isset($_SESSION['user_type'])) {
                        if($_SESSION['user_type'] == 1) {
                            echo '<a href="page/company/enterprofile.php" class="menu-forcompany">สำหรับสถานประกอบการ</a>
                            <a href="page/student/profile.php"><img class="account-menu-student" src="pictures/Icon/user_icon.png" alt=""></a>';
                        }else if($_SESSION['user_type'] == 2){
                            echo '<a href="page/student/enterprofile.php" class="menu-register">ลงทะเบียน</a>
                            <a href="page/company/profile.php"><img class="account-menu-company" src="pictures/Icon/building.png" alt=""></a>';
                        }
                    }else {
                        echo '<a href="page/company/enterprofile.php" class="menu-forcompany">สำหรับสถานประกอบการ</a>
                        <a href="login.php">เข้าสู่ระบบ</a>
                        <a href="page/student/enterprofile.php" class="menu-register">ลงทะเบียน</a>';
                    }
                ?>
            </div>
        </div>
    </header>
    
    <div class="content">
        <div class="banner">
            <div class="banner-content">
                <p>ค้นหาที่ฝึกงานในรูปแบบของคุณเอง</p>
                <div class="banner-search">
                    <form action="page/student/dashboard.php">
                        <input type="text" name="keyword" class="search" placeholder="พิมพ์คำหลักเพื่อค้นหา">
                        <button type="submit"><img src="pictures/Icon/search.png" alt=""></ิ>
                    </form>
                </div>
            </div>
        </div>
        <div class="preset-search">
            <div class="img"><img src="pictures/Image/index1.png" alt=""></div>
            <div class="container-preset-search">
                <p>ค้นหาที่ฝึกงาน</p>
                <div class="preset">
                    <?php 
                        $stmt = $con->query("Select * from job order by rand() limit 20");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($stmt->fetchAll() as $row) {
                            echo "<a href='page/student/dashboard.php?job_id=".$row['j_id']."'>$row[j_jobname]</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="container-method">
            <p>ได้ที่ฝึกงานง่ายๆ ใน 3 ขั้นตอน</p>
            <div class="method-group">
                <div class="method">
                    <img src="pictures/Image/method1.png" alt="">
                    <p class="title">สร้างโปรไฟล์</p>
                    <p class="content-method">นักศึกษาสามารถสร้างโปรไฟล์ได้ง่ายๆ โดการ ลงเบียน</p>
                </div>
                <div class="method">
                    <img src="pictures/Image/method2.png" alt="">
                    <p class="title">ค้นหาที่ฝึกงาน</p>
                    <p class="content-method">ระบบ FIS จะช่วยให้นักศึกษาหาที่ฝึกงานได้เริ่มใช้ระบบ FIs</p>
                    
                </div>
                <div class="method">
                    <img src="pictures/Image/method3.png" alt="">
                    <p class="title">ติดต่อ</p>
                    <p class="content-method">สามารถติดต่อกับสถานประกอบการได้ทัน</p>
                    
                </div>
            </div>
        </div>
        <div class="container-why">
            <div class="why">
                <p class="title-why">ทำไมต้อง MyInternship</p>
                <p class="content-why">เรามีระบบ FIs (Find Internship) เป็นระบบที่จะช่วยแนะนำสถานที่ฝึกงาน ให้กับนักเรียนนักศึกษา ตามศักยภาพของนักเรียนนักศึกษา โดยจะวิเคราะห์จากแบบทดสอบที่นักเรียนนักศึกษาได้ทำ</p>
            </div>
            <div class="why"><img src="pictures/Image/why.png" alt=""></div>
        </div>
        <div class="content-learning">
            <div class="content-ability">
                <div class="content1">
                    <h2>ฉันมีความสามารถด้านไหน ?</h2>
                    <p>
                        นักศึกษาบางคนยังไม่ค้นพบตัวเอง ยังไม่รู้ว่าตัวเองมีปัญญาด้านไหน MyInternship มีระบบวิเคราะห์ความสามารถด้านปัญญาของเราได้ โดยให้นักศึกษาทำแบบทดสอบ
                    </p>
                    <a href="page/student/quiz.php">ทำแบบสอบ</a>
                </div>
                <div class="intellect">
                    <h3>ทฤษฎีพหุปัญญา</h3>
                    <div class="theory-intellect">
                        <?php 
                            $stmt = $con->query("Select * from intelligent_type order by itt_id");
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach($stmt->fetchAll() as $row) {
                                echo "<a href='#'>$row[itt_type]</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="image-search2">
                <img src="pictures/Image/index2.png" alt="">
            </div>
        </div>
        <div class="container-company">
            <p class="company-title">สถานประกอบการที่เข้าร่วม</p>
            <div class="anycompany">
                <?php 
                    $stmt = $con->query("Select * from company");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $row) {
                        echo '<div class="company">
                                <div class="company-logo">
                                    <img src="pictures/Icon/building.png">
                                </div>
                                <p class="company-name">' . $row['cp_nameth'] . '</p>  
                        </div>';
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container-footer">
            <div class="col-first">
                <div class="row">
                    <img src="pictures/Icon/Logo/logoSTD.png" alt="">
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
                    <a href="page/student/enterprofile.php">ลงทะเบียน</ฟ>
                    <a href="page/student/quiz.php">ทำแบบทดสอบ</a>
                </div>
                <div class="col">
                    <h3>สำหรับสถานประกอบการ</h3>
                    <a href="page/company/enterprofile.php">ลงทะเบียน</a>
                    <a href="page/company/createpost.php">ลงประกาศรับฝึกงาน</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
