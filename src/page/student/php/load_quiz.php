<?php
    $quiz = array();

    $checked = array();
    $quizs_type = array();
    $sql_load_quiz = "Select * from quiz order by rand();";
    $quiz_stmt = $con->query($sql_load_quiz);
    $quiz_stmt->execute();
    $quiz_stmt->setFetchMode(PDO::FETCH_ASSOC);
    $quiz_num = 0;
    foreach($quiz_stmt->fetchAll() as $row) {
        $checked[] = array("q_id"=>$row['q_id'],"itt_id"=>$row['itt_id'],"quiz_checked"=>'1');
        $quiz_num++;
        echo "
            <div class='quiz-card'>
                <p class='quiz'>" . $quiz_num . ". ". $row['q_quiz'] . "</p>
                <div class='option'>
                    <input type='radio' name='" . $row['q_id'] . "' value='0'>
                    <label>น้อยที่สุด</label>
                    <input type='radio' name='" . $row['q_id'] . "' value='5'>
                    <label>น้อย</label>
                    <input type='radio' name='" . $row['q_id'] . "' value='10'>
                    <label>ปานกลาง</label>
                    <input type='radio' name='" . $row['q_id'] . "' value='15'>
                    <label>มาก</label>
                    <input type='radio' name='" . $row['q_id'] . "' value='20'>
                    <label>มากที่สุด</label>
                </div>
            </div>
        ";
    }
    $_SESSION['checked'] = $checked;
    $_SESSION['quizs_type'] = $quizs_type;
?>