<?php
    session_start();
    include('../../config/server.php');
    $is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');
 
    if($is_page_refreshed ) {
      unset($_GET['keyword']);
      unset($_GET['job_id']);
      unset($_GET['company-name']);
      unset($_GET['major']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include sytle file -->
    <link rel="stylesheet" href="style/dashboard.css">
    <!-- include icon title page -->
    <link rel="icon" href="../../pictures/Icon/icon_logo.png">
    <!-- include js file -->
    
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
                <a href="quiz.php">ทำแบบทดสอบ</a>
                <?php 
                    if(isset($_SESSION['user_type'])) {
                        if($_SESSION['user_type'] == 1) {
                            echo '<a href="profile.php"><img class="account-menu-student" src="../../pictures/Icon/user_icon.png" alt=""></a>';
                        }else if($_SESSION['user_type'] == 2){
                            echo '<a href="enterprofile.php" class="menu-register">ลงทะเบียน</a>
                            <a href="../company/profile.php"><img class="account-menu-company" src="../../pictures/Icon/building.png" alt=""></a>';
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
    <div class="content content-dashboard">
        <div class="container-search">
            <form action="">
                <div class="container-title-condition">
                    <img src="../../pictures/Icon/filter.png" alt="">
                    <p>เงื่อนไขการค้นหา</p>
                </div>
                <div class="input-group">
                    <div class="input-section">
                        <select name="job_id" class="input">
                            <option value="">ประเภทของงาน</option>
                            <?php 
                                $stmt_load_job = $con->query("Select * from job");
                                if($stmt_load_job->execute()) {
                                    $stmt_load_job->setFetchMode(PDO::FETCH_ASSOC);
                                    foreach($stmt_load_job->fetchAll() as $row) {
                                        echo '<option value="'.$row['j_id'].'">'.$row['j_jobname'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-section">
                        <input type="text" class="input" name="company-name" placeholder="ค้นหาโดยใช้ชื่อสถานประกอบการ" value="<?php if(isset($_GET['company-name'])) { echo $_GET['company-name']; }?>" >
                        <p class="log">
                            <?php
                                if(isset($_SESSION['log-company-name'])) {
                                    echo $_SESSION['log-company-name'];
                                    unset($_SESSION['log-company-name']);
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="input-group" style="justify-content: space-between; margin-top: 5px;">
                    <input type="submit" class="submit" value="ค้นหา">
                </div>
            </form>
        </div>
        <div class="container-search">
            <div class="banner">
                <div class="container-title-search">
                    <img src="../../pictures/Icon/search.png" alt="">
                    <p>ค้นหาที่ฝึกงาน</p>
                </div>
                <form action="" method="get">
                    <div class="input-group">
                        <div class="input-section" style="flex-grow: 10; margin-right: 10px;">
                            <input type="text" class="input" name="keyword" placeholder="พิมพ์คำหลักเพื่อค้นหา" value="<?php if(isset($_GET['keyword'])) {echo $_GET['keyword'];} ?>">
                        </div>
                        <div class="input-section">
                            <input type="submit" class="submit" value="ค้นหา">
                        </div>
                    </div>
                </form>
            </div>
            <?php
                $sql = "SELECT company.cp_id, company.cp_nameth, company.cp_nameeng,address_company.*, post.* from post JOIN company on post.cp_id=company.cp_id JOIN address_company on post.cp_id=address_company.ad_id order by post.p_id desc; ";
                
                if(isset($_GET['keyword'])) {
                    $keyword = $_GET['keyword'];
                    $sql = "SELECT company.cp_id, company.cp_nameth, company.cp_nameeng,address_company.*, post.* from post JOIN company on post.cp_id=company.cp_id JOIN address_company on post.cp_id=address_company.ad_id WHERE post.p_title like '%$keyword%' order by post.p_id desc;";
                }
                
                if(isset($_GET['job_id'])) {
                    if(!empty($_GET['job_id'])) {
                        $job_id = $_GET['job_id'];
                        $sql = "SELECT company.cp_id, company.cp_nameth, company.cp_nameeng,address_company.*, post.* from post JOIN company on post.cp_id=company.cp_id JOIN address_company on post.cp_id=address_company.ad_id WHERE post.j_id='$job_id' order by post.p_id desc;";
                    }
                }
                if(isset($_GET['company-name'])) {
                    if(!empty($_GET['company-name'])) {
                        $company_name = $_GET['company-name'];
                        $sql = "SELECT company.cp_id, company.cp_nameth, company.cp_nameeng,address_company.*, post.* from post JOIN company on post.cp_id=company.cp_id JOIN address_company on post.cp_id=address_company.ad_id WHERE company.cp_nameth like '%$company_name%' or company.cp_nameeng like '%$company_name%' order by post.p_id desc;";
                    }
                }
                
                if(isset($_GET['intelligent'])) {
                    if(!empty($_GET['intelligent'])) {
                        $intelligent = $_GET['intelligent'];
                        $sql = "SELECT company.cp_id, company.cp_nameth, company.cp_nameeng,address_company.*, post.*, job.itt_id from post JOIN company on post.cp_id=company.cp_id JOIN address_company on post.cp_id=address_company.ad_id JOIN job on job.j_id=post.j_id WHERE job.itt_id='$intelligent'";
                    }
                }

                if(isset($_GET['major'])) {
                    $major = $_GET['major'];
                    if(!empty($major)) {
                        $sql = "SELECT company.cp_id, company.cp_nameth, company.cp_nameeng, address_company.*, post.*, major_job.* from major_job JOIN post on post.j_id=major_job.j_id JOIN company on company.cp_id=post.cp_id JOIN address_company ON address_company.ad_id=post.cp_id WHERE major_job.mj_id ='$major';";
                    }
                }

                $stmt_load_post = $con->query($sql);
                if($stmt_load_post->execute()) {
                    $stmt_load_post->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt_load_post as $row) {
                        echo '
                            <a href="../company/postfullview.php?post_id='. $row['p_id'] .'">
                                <div class="container-post">
                                    <div class="post">
                                        <div class="icon-company">
                                            <img src="../../pictures/Icon/building.gif" alt="">
                                        </div>
                                        <div class="content-post">
                                            <p class="title-post">'.$row['p_title'].'</p>
                                            <div class="about-company">
                                                <img src="../../pictures/Icon/flat.png" alt="">
                                                <span>'.$row['cp_nameth']. '('.$row['cp_nameeng'].')</span>
                                            </div>
                                            <div class="about-company">
                                                <img src="../../pictures/Icon/location.png" alt="">
                                                <span>'.$row['ad_address'].', '.$row['ad_sub_district'].', '.$row['ad_district'].', '.$row['ad_province'].', '.$row['ad_zipcode'].'</span>
                                            </div>
                                            <p class="details">
                                                '. $row['p_details'] .'
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
            ?>
            <!-- <a href="postfullview.html">
                <div class="container-post">
                    <div class="post">
                        <div class="icon-company">
                            <img src="../../pictures/Icon/building.gif" alt="">
                        </div>
                        <div class="content-post">
                            <div style="display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;">
                                <p class="title-post" >Post Title</p>
                                <a href="#"><img src="../../pictures/Icon/unstar.png" style="width: 25px; height: 25px; margin-left: 10px;" alt=""></a>
                            </div>
                            <div class="about-company">
                                <img src="../../pictures/Icon/flat.png" alt="">
                                <span>คอมพิวเตอร์ ชิป(MyComputer ship)</span>
                            </div>
                            <div class="about-company">
                                <img src="../../pictures/Icon/location.png" alt="">
                                <span>คอมพิวเตอร์ ชิป(MyComputer ship)</span>
                            </div>
                            <p class="details">
                                รายละเอียด : L
                            </p>
                        </div>
                    </div>
                    <div class="container-post-date">
                        <p class="post-date">9/12/2656 5:00</p>
                    </div>
                </div>
            </a>-->
        
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