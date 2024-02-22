<?php 
try {
    $host = "localhost";
    $dbname = "id21910681_sls";
    $user = "id21910681_root";
    $password = "Marcito@123";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($conn){
    //     echo 'Connected to DB';
    // }
} catch (PDOException $err) {
    echo $err->getMessage();
}
?>