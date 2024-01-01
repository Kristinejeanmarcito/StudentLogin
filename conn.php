<?php 
try {
    $host = "localhost";
    $dbname = "id21734657_sls";
    $user = "id21734657_root";
    $password = "Kris@123";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($conn){
    //     echo 'Connected to DB';
    // }
} catch (PDOException $err) {
    echo $err->getMessage();
}
?>