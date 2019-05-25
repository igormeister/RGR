<?php

session_start();

include_once('../functions.php');

$link = dbConnect();

$email = $_POST['email'];
$login = $_POST['login'];
$password = md5($_POST['password']);
$passwordAgain =  md5($_POST['passwordAgain']);
$token = md5($password);

if ($password != $passwordAgain) {
    header("Location: ../signup.php?error=1");
}

$checkEmails = mysqli_query($link, "SELECT * FROM person WHERE email ='".$email."'");
if (mysqli_num_rows($checkEmails) != 0) {
    header("Location: ../signup.php?error=2");
}

$checkLogins = mysqli_query($link, "SELECT * FROM person WHERE login ='".$login."'");
if (mysqli_num_rows($checkLogins) != 0) {
    header("Location: ../signup.php?error=3");
}

$insertQuery = "INSERT INTO `person` (`id`, `login`, `email`, `password`, `token`) VALUES (NULL, '$login', '$email', '$password', '$token')";
mysqli_query($link, $insertQuery);

$_SESSION['token'] = $token;

header('Location: ../index.php');
