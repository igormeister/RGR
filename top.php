<?php 
session_start();
include_once('functions.php');
$link = dbConnect();
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    $person = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person WHERE token='".$token."'"));
}
