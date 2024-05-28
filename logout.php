<?php

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['user_id_change_pass']);
session_abort();
header('Location:login.php');