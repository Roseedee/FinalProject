<?php
    //การประกาศตัวแปร
    $var;

    //comment แบบบรรทัดเดียว
    //$name; // นี้คือชื่อ
            #;asdfs


    //comment แบบหลายบรรทัด
    /* a;sldjk;flajsdf
    ;salkjdf;lajsd
    ;as;dfla
    */

    //การกำหนดค่าให้กับตัวแปร
    $name = "Roseedee"; //String
    $age = 21;          //integer
    $weight = 85.5;     //floating

    //การแสดงค่าในตัวแปร
    //echo $name;

    //ดำเนินการทางคณิต
    $sum1 = 2 * (2 + 3);
    $sum2 = 2 + 3 * 2;

    //echo $sum1;

    //เงื่อนไข
    //0 = false;
    //>= 1 = true;
    $a = 10;
    $b = 11;
    // > < >= <= == !=
    /* if($a > $b) {
        echo "Hello";
    }else {
        echo "Sorry";
    } */

    /* //
    $a = 'a';
    switch($a) {
        case 'a':
        case 'b':
            echo 2;
            break;
        case 'c':
            echo 3;
            break;
        default:
            echo "Sorry";
    } */

    //loop
    /* for($a = 1; $a <= 10; $a++) {
        echo "$a Hello<br>";
    } */

    /* $a = 1;
    do {
        echo "$a Hello<br>";
        $a++;
    }while($a <= 10); */

    //build-in function
    //echo "Hello";



    /* function writeMsg() {
        echo 10;
    }

    writeMsg(); */


    /* $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully"; */
?>