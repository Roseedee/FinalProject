<?php
    session_start();
    include('../../config/server.php');
    if(isset($_GET['post-id'])) {
        $post_id = $_GET['post-id'];
        $sql = "Select * from post where p_id='$post_id'";
        try {
            $stmt = $con->query($sql);
            $stmt->execute();
            $prow = $stmt->fetch();
            $_SESSION['post_id'] = $prow['p_id'];
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }else {
        header('location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include style file -->
    <link rel="stylesheet" href="style/createpost.css">
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
                <a href="profile.php"><img class="account-menu" src="../../pictures/Icon/building.gif" alt=""></a>
            </div>
        </div>
    </header>
    <!-- conntent -->
    <div class="content content-create-post">
        <div class="title">
            <p>สร้างโพสต์</p>
        </div>
        <div class="form-input">
            <form action="php/updatepost.php" method="post">
                <span>เกี่ยวโพสต์</span>
                <div class="input-group">
                    <div class="input-section">
                        <input class="input" type="text" name="title-post" placeholder="หัวข้อ" value="<?php if(isset($_GET['post-id'])) {echo $prow['p_title']; } ?>">
                    </div>
                </div>
                <span>รายละเอียดเกี่ยวกับการฝึกงาน</span>
                <div class="input-group">
                    <div class="input-section">
                        <textarea class="input" type="text" name="details-post" rows="10" placeholder="รายละเอียดในการฝึกงาน"><?php if(isset($_GET['post-id'])) {echo $prow['p_details']; } ?></textarea>
                    </div>
                </div>
                <span>สายงาน</span>
                <div class="input-group">
                    <div class="input-section">
                        <select class="input" name="job">
                            <?php
                                $stmt_load_job = $con->query("Select j_id,j_jobname from job");
                                if($stmt_load_job->execute()) {
                                    $stmt_load_job->setFetchMode(PDO::FETCH_ASSOC);
                                    foreach($stmt_load_job->fetchAll() as $row) {
                                        if($prow['j_id'] == $row['j_id']) {
                                            echo '<option value='. $row['j_id'] .' selected >' . $row['j_jobname'] . '</option>';
                                        }else {
                                            echo '<option value='. $row['j_id'] .'>' . $row['j_jobname'] . '</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="input-submit" style="margin-top: 10px;">
                    <input type="submit" value="บันทึก" class="submit">
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

</body>
</html>