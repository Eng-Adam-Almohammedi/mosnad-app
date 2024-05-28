<?php

include_once "./_pdo.php";

$dsn = "mysql:host=localhost;dbname=mosnaddb";
$user = "root";
$pass = "";
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" // FOR Arabic
);
try {

    $con = @PDO_Connect($dsn, $user, $pass);
    if (!$con) {
        echo 'connection fail';
    }
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
    include "functions.php";

    // checkAuthenticate() ; 
} catch (PDOException $e) {
    echo $e->getMessage();
}
