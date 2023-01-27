<?php
    $getskill = $con->query("select * from student_skill where st_id='$_SESSION[user_id]'");
    $getskill->execute();
    $getskill->setFetchMode(PDO::FETCH_ASSOC);
    foreach($getskill->fetchAll() as $row) {
        echo "<div class='selected'><span class='selected-name'>" . $row['skt_type'] . " : " . $row['sk_skill'] . "</span>";
        echo "<a href='php/deleteskill.php?sk_id=". $row['sk_id'] ."' class='btn-cancel-selected'><img src='../../pictures/Icon/cancel.png'></a></div>";
    }

?>