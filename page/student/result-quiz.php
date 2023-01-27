<?php
    session_start();
    include('../../config/server.php');
    
    $result_quiz = array();
    foreach($_SESSION['result_quiz'] as $row) {
        $result_quiz[] = "\"" . $row . "\"";
    }
    $result_quiz = implode(",", $result_quiz);

    $intelligent = array();
    $sql_intelligent = "select itt_type from intelligent_type order by itt_id";
    $intelligent_stmt = $con->query($sql_intelligent);
    $intelligent_stmt->execute();
    $intelligent_stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($intelligent_stmt->fetchAll() as $row) {
        $intelligent[] = "\"". $row['itt_type']."\"";
    }
    $intelligent = implode(",", $intelligent);

    for($i = 1; $i <= 8; $i++) {
        $sum = 0;
        $tempstmt = $con->query("Select rqr_result, itt_id from result_quiz_round where st_id='$_SESSION[user_id]' and itt_id='$i'");
        $tempstmt->execute();
        $count_row = $tempstmt->rowCount();
        if($count_row == 1) {
            $row = $tempstmt->fetch();
            $insert_result = $con->exec("insert into result_quiz values (NULL, '$_SESSION[user_id]', '$row[rqr_result]', '$row[itt_id]')");
            // echo "Insert";
        }else if($count_row > 1) {
            $tempstmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($tempstmt->fetchAll() as $row) {
                $sum += $row['rqr_result'];
            }
            $average = $sum / $count_row;
            $update_result = $con->exec("update result_quiz set rq_average=$average where st_id='$_SESSION[user_id]' and itt_id='$i'");
            // echo "Update";
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
    <link rel="stylesheet" href="style/result-quiz.css">
    <!-- include icon title page -->
    <link rel="icon" href="../../pictures/Icon/icon_logo.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <div class="container-result-quiz">
            <hr width="100%">
            <div class="chart">
                <canvas id="chart"></canvas>
                <script>
                    const my_chart = document.getElementById("chart");
                    let data = {
                        labels:[<?php echo $intelligent; ?>],
                        datasets:[
                            {
                            label: 'My Chart',
                            data: [<?php echo $result_quiz; ?>],
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
                    new Chart(my_chart, {
                        type: 'radar',
                        data: data,
                        options: {
                            scales: {
                              r: {
                                pointLabels: {
                                  font: {
                                    size: 14
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
                                            size: 16
                                        }
                                    }
                                }
                            }
                            
                        },
                    })
                </script>
            </div>
            <div class="container-submit">
                <a href="profile.php" class="submit">กลับสู่หน้าโปรไฟล์</a>
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
</body>
</html>