<?php
    $getskill = $con->query("select * from student_job where st_id='$_SESSION[user_id]'");
    $getskill->execute();
    $getskill->setFetchMode(PDO::FETCH_ASSOC);
    foreach($getskill->fetchAll() as $row) {
        echo "<div class='selected'><span class='selected-name'>" . $row['j_jobname'] . "</span>";
        echo "<a href='php/deletejob.php?j_id=" . $row['j_id'] . "' class='btn-cancel-selected'><img src='../../pictures/Icon/cancel.png'></a></div>";
    }
?>