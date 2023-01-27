<?php
    include('../../config/server.php');
    $select = $_REQUEST['select'];
    $skillstmt = $con->query("Select * from skill where skt_id='$select'");
    $skillstmt->execute();
    $skillstmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($skillstmt->fetchAll() as $row) {
        echo "<option value='" . $row['sk_id'] . "'>" . $row['sk_skill'] . "</option>";
    }
?>