<?php 
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
