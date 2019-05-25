<?php
session_start();
$email = $_POST['email'];
$password = md5($_POST['password']);
$link = mysqli_connect("127.0.0.1", "root", "", "web");
$query = "SELECT * FROM `person` WHERE email='$email' AND password='$password'";
if (null != mysqli_query($link, $query)) {
  $signIn = mysqli_fetch_array(mysqli_query($link, $query));
  if (isset($signIn)) {
    $_SESSION['userId'] = $signIn['id'];
  }
}
header('Location: ../index.php');
