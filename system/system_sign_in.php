<?php

session_start();

include_once('../functions.php');

$link = dbConnect();

$login =  mysqli_real_escape_string($link, $_POST['login']);
$password = md5($_POST['password']);
$token = md5($password);

$checkLogins = mysqli_query($link, "SELECT * FROM person WHERE login ='".$login."' AND password = '".$password."'");
if (mysqli_num_rows($checkLogins) == 0) {
    header("Location: ../signin.php?error=1");
} else {
    $_SESSION['token'] = $token;
    header('Location: ../index.php');
}


