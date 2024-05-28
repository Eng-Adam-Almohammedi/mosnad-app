<?php

include './connection.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!$email && !$password) {
        header('Location:login.php?empty');
    } else {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = PDO_FetchRow($query);
        if (($result) != false) {
            $user = $result;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header('Location:index.php?home');
        } else {
            header('Location:login.php?loginErr');
        }
    }
}
elseif (isset($_POST['signup'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $phoneNumber = $_POST["phone_number"];
    $roleClientId = 3;

    try {
        $stmt = $con->prepare("
    INSERT INTO `users`(`username`, `email`, `password`,`phone_number`,`role_id`) 
    VALUES (    ?   ,   ?   ,   ? ,  ? ,?  )");
        $pass = md5($pass);
        $stmt->execute(array($username, $email, $pass, $phoneNumber, $roleClientId));
        $count = $stmt->rowCount();
        if ($count > 0) {
            header('Location:login.php');
        } else {
            header('Location:signup.php?signupErr');
        }
    } catch (\PDOException $th) {
        header('Location:signup.php?signupErr');
    }
}
elseif (isset($_POST['forget_password'])) {
    $email = $_POST['email'];
    if (!$email) {
        header('Location:login.php?empty');
    } else {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = PDO_FetchRow($query);
        if (($result) != false) {
            $user = $result;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header('Location:reset_password.php');
        } else {
            header('Location:forget_password.php');
        }
    }
}

