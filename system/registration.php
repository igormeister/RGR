<?php
session_start();
$email = $_POST['email'];
$login = $_POST['login'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = md5($_POST['password']);
$repeatPassword = md5($_POST['repeatPassword']);
##Написать проверку email
if (isset($_POST['email']) && $_POST['login'] && $_POST['name'] && $_POST['surname'] && $_POST['password'] && $_POST['repeatPassword']) {
  if ($password == $repeatPassword) {
    $query = "INSERT INTO `person`(`id`, `name`, `surname`, `login`, `email`, `password`) VALUES (NULL,'$name','$surname','$login','$email','$password')";
    $link = mysqli_connect("127.0.0.1", "root", "", "web");
    mysqli_query($link, $query);
    $sql = "SELECT MAX(`id`) as uid FROM `person`";
    $_SESSION['userId'] = mysqli_fetch_array(mysqli_query($link, $sql))['uid'];
  }
}
header('Location: ../index.php');
