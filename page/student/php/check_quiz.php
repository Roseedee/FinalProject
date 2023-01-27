<?php
    session_start();
    include('../../../config/server.php');

    $id = $_SESSION['user_id'];
    $num = 0;
    $quiz_checked = array();
    $result_quiz = array(0, 0, 0, 0, 0, 0, 0, 0);
    foreach($_SESSION['checked'] as $row) {
        if(isset($_POST[$row['q_id']])) {
            $num++;
            $row['quiz_checked'] = $_POST[$row['q_id']];
    
            if($row['itt_id'] == '1') {
    
                $result_quiz[0] += $row['quiz_checked'];
    
            }else if($row['itt_id'] == '2') {
    
                $result_quiz[1] += $row['quiz_checked'];
    
            }else if($row['itt_id'] == '3') {
    
                $result_quiz[2] += $row['quiz_checked'];
    
            }else if($row['itt_id'] == '4') {
    
                $result_quiz[3] += $row['quiz_checked'];
    
            }else if($row['itt_id'] == '5') {
    
                $result_quiz[4] += $row['quiz_checked'];
    
            }else if($row['itt_id'] == '6') {
    
                $result_quiz[5] += $row['quiz_checked'];
    
            }else if($row['itt_id'] == '7') {
    
                $result_quiz[6] += $row['quiz_checked'];
    
            }else if($row['itt_id'] == '8') {
                
                $result_quiz[7] += $row['quiz_checked'];
            }
        }

    }

    if($num < 40) {
        $_SESSION['quiz-log'] = "กรุณากรอกข้อมูลอีกครั้งเนื่องจากเลือกไม่ครบ";
        echo("<script>location.href = '../quiz.php';</script>");
    }

    // for($l = 0; $l <count($result_quiz); $l++) {
    //     echo $result_quiz[$l] . " ";
    // }

    $sql = "insert into result_quiz_round values         
        (NULL, $result_quiz[0], '$id', 1),
        (NULL, $result_quiz[1], '$id', 2),
        (NULL, $result_quiz[2], '$id', 3),
        (NULL, $result_quiz[3], '$id', 4),
        (NULL, $result_quiz[4], '$id', 5),
        (NULL, $result_quiz[5], '$id', 6),
        (NULL, $result_quiz[6], '$id', 7),
        (NULL, $result_quiz[7], '$id', 8);
    ";

    try {
        $con->exec($sql);
        $_SESSION['result_quiz'] = $result_quiz;
        echo("<script>location.href = '../result-quiz.php';</script>");
    }catch(PDOException $e) {
        echo "Insert Failed : " . $e->getMessage();
    }

?>