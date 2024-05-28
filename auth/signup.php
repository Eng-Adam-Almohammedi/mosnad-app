<?php
include "../connection.php";
$username = filterRequest("username");
$email = filterRequest("email");
$pass = filterRequest("password");
$phoneNumber = filterRequest("phone_number");
$roleClient = 3;

try {
    $stmt = $con->prepare("
    INSERT INTO `users`(`username`, `email`, `password`,`phone_number`,`role_id`) 
    VALUES (    ?   ,   ?   ,   ? ,  ?   )");
    
    $stmt->execute(array($username, $email, $pass, $phoneNumber, $roleClient));
    $count = $stmt->rowCount();
    
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "fail"));
    }
    } catch (\PDOException $th) {
        echo json_encode(array("status" => "fail"));
    }
