<?php 
    // $host = "localhost";
    // $username = "id20129649_roseedee";
    // $password = "|@mfwXflZC}Z9pkT";
    // $database = "id20129649_myinternship_database";
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "myinternship_db1";
    try {
        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $e) {
        echo "Connect to Server Failed : " . $e->getMessage();
    }
?>