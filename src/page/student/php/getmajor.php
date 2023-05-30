<?php
    include('../../../config/server.php');

    $select = $_REQUEST['select'];
    $skillstmt = $con->query("Select * from major where mj_education_lv='$select'");
    $skillstmt->execute();
    $skillstmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($skillstmt->fetchAll() as $row) {
        echo "<option value='" . $row['mj_id'] . "'>" . $row['mj_name'] . "</option>";
    }

?>