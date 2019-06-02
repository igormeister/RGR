<?php 
session_start();
include_once('functions.php');
$link = dbConnect();
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    $person = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person WHERE token='".$token."'"));
    $isPersonBook = mysqli_num_rows(mysqli_query($link, "SELECT * FROM booked WHERE booked_user_id =".$person['id']));
}
