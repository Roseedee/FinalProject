<?php
    $user_id = $_SESSION['user_id'];
    $stmt_load_post = $con->query("Select * from post where cp_id='$user_id'");
    if($stmt_load_post->execute()) {
        $stmt_load_post->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt_load_post as $row) {
            echo '
                <a href="postfullview.php?post_id='. $row['p_id'] .'">
                    <div class="container-post">
                        <div class="post">
                            <div class="icon-company">
                                <img src="../../pictures/Icon/building.gif" alt="">
                            </div>
                            <div class="content-post">
                                <p class="title-post">'.$row['p_title'].'</p>
                                <div class="about-company">
                                    <img src="../../pictures/Icon/flat.png" alt="">
                                    <span>'.$_SESSION['company-name'].'</span>
                                </div>
                                <div class="about-company">
                                    <img src="../../pictures/Icon/location.png" alt="">
                                    <span>คอมพิวเตอร์ ชิป(MyComputer ship)</span>
                                </div>
                                <p class="details">
                                    รายละเอียด : '. $row['p_details'] .'
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