<?php
include "../connection.php";
$email = filterRequest("email");
$pass = filterRequest("password");

$stmt = $con->prepare("SELECT * FROM `users` WHERE `email`=? AND `password`=?");
$stmt->execute(array($email, $pass));
$data=$stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) { 
    echo json_encode(array("status" => "success","data"=>$data));
} else {
    echo json_encode(array("status" => "fail"));
}
