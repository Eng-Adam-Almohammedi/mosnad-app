<?php
include_once "connection.php";

    session_start();

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM users WHERE id = '$user_id'";
    $result = PDO_FetchRow($userQuery);
    if (($result) != false) {
        $user = $result;
    }
} else {
    header('Location:login.php');
}
include_once "header.php";
if (isset($_GET['home'])) {
    include_once "home.php";
}

include_once "footer.php";
