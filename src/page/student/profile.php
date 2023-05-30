<?php
    session_start();
    include('../../config/server.php');

    if(isset($_SESSION['login_state'])) {
        if($_SESSION['login_state'] == "Successfully") {
            $_SESSION['user_type'] = 1;
            // get data about user
            $stsql =  "Select * from student where st_id='$_SESSION[user_id]'";
            $ststmt = $con->query($stsql);
            $ststmt->execute();
            $strow = $ststmt->fetch();
            
            //get address
            $adsql = "Select * from address_student where ad_id='$_SESSION[user_id]'";
            $adstmt = $con->query($adsql);
            $adstmt->execute();
            $adrow = $adstmt->fetch();
            
            // get intelligent
            $intelligent = array();
            $intelligent_stmt = $con->query("select itt_type from intelligent_type order by itt_id");
            $intelligent_stmt->execute();
            $intelligent_stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($intelligent_stmt->fetchAll() as $row) {
                $intelligent[] = "\"". $row['itt_type']."\"";
            }
            $intelligent = implode(",", $intelligent);
    
            $result_quiz_average = array();
            $result_quiz_stmt = $con->query("select rq_average from result_quiz where st_id='$_SESSION[user_id]' order by itt_id");
            $result_quiz_stmt->execute();
            $result_quiz_stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($result_quiz_stmt->fetchAll() as $row) {
                $result_quiz_average[] = "\"". $row['rq_average']."\"";
            }
            $result_quiz_average = implode(",", $result_quiz_average);
    
            //get intelligent maximum for search
            $itt_max_array = array();
            $itt_max;
            $ittmaxstmt = $con->query("select result_quiz.*, intelligent_type.* from result_quiz join intelligent_type on intelligent_type.itt_id=result_quiz.itt_id WHERE result_quiz.rq_average=(SELECT MAX(result_quiz.rq_average) from result_quiz WHERE st_id='$_SESSION[user_id]') and result_quiz.st_id='$_SESSION[user_id]';");
            $ittmaxstmt->execute();
            $itt_max = $ittmaxstmt->fetch();
        }
    }else {
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
    <link rel="stylesheet" href="style/profile.css">
    <!-- include icon title page -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <a href="dashboard.php">ที่ฝึกงานทั้งหมด</a>
                <a href="quiz.php">ทำแบบทดสอบ</a>
                <a href="profile.php"><img class="account-menu" src="../../pictures/Icon/user_icon.png" alt=""></a>
            </div>
        </div>
    </header>
    <!-- conntent -->
    <div class="content">
        <div class="title">
            <p>โปรไฟล์ของฉัน</p>
            <div class="sub-menu">
                <a href="enterprofile.php?user_id=<?php echo $_SESSION['user_id']; ?>"><div class="icon-sub-menu"><img src="../../pictures/Icon/edit.png" alt=""></div><span>แก้ไขข้อมูล</span></a>
                <a href="settings.php?user_id=<?php echo '$_SESSION[user_id]'; ?>"><div class="icon-sub-menu"><img src="../../pictures/Icon/setting.png" alt=""></div><span>ตังค่าบัญชี</span></a>
                <a href="php/logout.php"><div class="icon-sub-menu"><img src="../../pictures/Icon/logout.png" alt=""></div><span>ออกจากระบบ</span></a>
            </div>
        </div>
        <div class="content-profile">
            <div class="sub-content-profile user-img-container">
                <div class="user-img">
                    <img src="../../pictures/Icon/personal_image.png" alt="">
                </div>
                <?php 
                    echo "<p class='user-name'>" . $strow['st_fname'] . " " . $strow['st_lname'] . "</p>"
                ?>
            </div>
            <hr width="100%">
            <div class="sub-content-profile">
                <p class="sub-content-title">ประวัติส่วนตัว</p>
                <table>
                    <tr>
                        <td class="col1">วันเกิด</td>
                        <?php 
                            echo "<td class='col2'>" . date('d/m/Y', strtotime($strow['st_birthday'])) . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">เบอร์ติดต่อ</td>
                        <?php 
                            echo "<td class='col2'>" . $strow['st_tel'] . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">อีเมลล์</td>
                        <?php 
                            echo "<td class='col2'>" . $strow['st_email'] . "</td>";
                        ?>
                    </tr>
                </table>
            </div>
            <div class="sub-content-profile">
                <p class="sub-content-title">ที่อยู่</p>
                <table>
                    <tr>
                        <td class="col1">ที่อยู่</td>
                        <?php 
                            echo "<td class='col2'>" . $adrow['ad_address'] . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">ตำบล</td>
                        <?php 
                            echo "<td class='col2'>" . $adrow['ad_sub_district'] . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">อำเภท</td>
                        <?php 
                            echo "<td class='col2'>" . $adrow['ad_district'] . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">จังหวัด</td>
                        <?php 
                            echo "<td class='col2'>" . $adrow['ad_province'] . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">รหัสไปรษณีย์</td>
                        <?php 
                            echo "<td class='col2'>" . $adrow['ad_zipcode'] . "</td>";
                        ?>
                    </tr>
                </table>
            </div>
            <div class="sub-content-profile">
                <p class="sub-content-title">การศึกษา</p>
                <table>
                    <tr>
                        <td class="col1">สถานศึกษา</td>
                        <?php 
                            echo "<td class='col2'>" . $strow['st_academy'] . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">ระดับชั้น</td>
                        <?php 
                            echo "<td class='col2'>" . ($strow['st_education_lv'] == '1' ? 'ปวส' : 'ปวช') . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="col1">สาขาวิชา</td>
                        <?php 
                            $stmt = $con->query("select * from major where mj_id='$strow[mj_id]'");
                            $stmt->execute();
                            $major = $stmt->fetch();
                            echo "<td class='col2'>" . $major['mj_name'] . "</td>";
                        ?>
                    </tr>
                </table>
            </div>
            <div class="sub-content-profile sub-content-profile-empty"></div>
            <hr width="100%">
            <div class="sub-content-profile extension-sub-content-profile">
                <p>ทักษะและจุดแข็งของคุณมีอะไรบ้าง</p>
                <div class="container">
                    <!-- <div class="selected"><span class="selected-name">template</span><div class="btn-cancel-selected"><img src="../../pictures/Icon/cancel.png" alt=""></div></div> -->
                    <?php
                        include('php/getskill.php')
                    ?>
                    <div class="add-selection" id="add-skill">เพิ่มทักษะ</div>
                </div>
                
                <form action="php/add_skill.php" method="post" class="form-add-selection" id="form-add-selection-skill">
                    <div>
                        <label for="skill-type">ประเภทของทักษะ</label><br>
                        <select name="skill-type" class="input" onchange="selectchange(this.value)">
                            <option value=""></option>
                            <?php 
                                $skill_typestmt = $con->query("Select * from skill_type order by skt_type");
                                $skill_typestmt->execute();
                                $skill_typestmt->setFetchMode(PDO::FETCH_ASSOC);
                                foreach($skill_typestmt->fetchAll() as $row) {
                                    echo "<option value='" . $row['skt_id'] . "'>" . $row['skt_type'] . "</option>";
                                }
                            ?>
                            
                            <script>
                                function selectchange(str) {
                                    // window.alert(str);
                                    const xhttp = new XMLHttpRequest();
                                    xhttp.onload = function() {
                                        document.getElementById("option-skill").innerHTML = this.responseText;
                                    }
                                    xhttp.open("GET", "fillter.php?select="+str);
                                    xhttp.send();
                                }
                            </script>
                        </select>
                    </div>
                    <div>
                        <label for="skill">เลือกทักษะ</label><br>
                        <select name="skill" id="option-skill" class="input">
                        </select>
                    </div>
                    <div class="submit-container">
                        <input type="submit" value="เพิ่ม" class="submit">
                        <input type="button" value="ยกเลิก" class="submit btn-cancel" id="cancel-add-skill">
                    </div>
                </form>
            </div>
            <hr width="100%">
            <div class="sub-content-profile extension-sub-content-profile">
                <p>สายงานที่คุณสนใจ</p>
                <div class="container">
                    <?php
                        include("php/getjob.php")
                    ?>
                    <!-- <div class="selected"><span class="selected-name">วิศวกรรม</span><div class="btn-cancel-selected"><img src="../../pictures/Icon/cancel.png" alt=""></div></div>
                    <div class="selected"><span class="selected-name">การบัญชี</span><div class="btn-cancel-selected"><img src="../../pictures/Icon/cancel.png" alt=""></div></div> -->
                    <div class="add-selection" id="add-interested">เพิ่มสายงาน</div>
                </div>
                <form action="php/add_job_interest.php" method="post" class="form-add-selection" id="form-add-selection-interested">
                    <div>
                        <label for="interest-type">สายงาน</label><br>
                        <select name="job" class="input">
                            <?php
                                $่job_stmt = $con->query("select * from job");
                                $่job_stmt->execute();
                                $่job_stmt->setFetchMode(PDO::FETCH_ASSOC);
                                foreach($่job_stmt->fetchAll() as $row) {
                                    echo "<option value='" . $row['j_id'] . "'>" . $row['j_jobname'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="submit-container">
                        <input type="submit" value="เพิ่ม" class="submit">
                        <input type="button" value="ยกเลิก" class="submit btn-cancel" id="cancel-add-interested">
                    </div>
                </form>
            </div>
            <hr width="100%">
            <div class="sub-content-profile chart-container">
                <p class="sub-content-title">กราฟจากการทำแบบทดสอบ</p>
                <div style="width: 100%; text-align: center;">
                    <canvas id="mychart" width="10%"></canvas>
                </div>
                <script>
                    const my_chart = document.getElementById("mychart");
                    let data = {
                        labels:[<?php echo $intelligent ?>],
                        datasets:[
                            {
                            label: 'My Intelligent',
                            data: [<?php echo $result_quiz_average; ?>],
                            fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                            }
                        ]
                    }             
                    Chart.defaults.font.size = 14;
                    new Chart(my_chart, {
                        type: 'radar',
                        data: data,
                        options: {
                            scales: {
                              r: {
                                pointLabels: {
                                  font: {
                                    size: 12
                                  }
                                }
                              }
                            },
                            element: {
                                line: {
                                    borderWidth: 1
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        font: {
                                            size: 14
                                        }
                                    }
                                }
                            }
                            
                        },
                    })
                </script>
                <div style="text-align: center;">
                <?php
                    if(!empty($itt_max['itt_id'])) {
                        if($ittmaxstmt->rowCount() > 1) {
                            echo '</div><p>ระบบยังไม่สามารแนะนำสถานที่ฝึกงานได้ ทำแบบทดสอบอีกครั้งเพื่อเพิ่มความแม่นยำ<a href="quiz.php"  style="margin: 0px 10px; color: green; font-weight: 600;">ทำแบบทดสอบ</a></p>';
                        }else {
                            echo '<img style="width: 70%;" src="../../pictures/intelligent/'.$itt_max['img'].'" /></div>';
                            $stmtmath = $con->query("SELECT * from major_intelligent_type WHERE itt_id='$itt_max[itt_id]' and mj_id='$strow[mj_id]';");
                            $stmtmath->execute();
                            if($stmtmath->rowCount() >= 1) {
                                echo '<p><a href="dashboard.php?intelligent='.$itt_max['itt_id'].'" class="submit" style="margin: 0px 10px;">กดที่นี้</a> เพื่อค้นหาที่ฝึกงานที่เหมาะสมกับคุณ</p>';
                            }else {
                                echo '<p style="color: red">ความทนัดของคุณไม่ตรงกับสาขาที่คุณเรียน</p>';
                            }
                        }
                    }
                    echo '<br><p>หรือค้นหาสถานที่ฝึกงานตามสาขาที่คุณเรียน <a href="dashboard.php?major='.$major['mj_id'].'" class="submit" style="margin: 0px 10px;">ค้นหา</a></p>';
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
    <script src="script/profile.js"></script>
</body>
</html>