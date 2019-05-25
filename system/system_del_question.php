<?php
session_start();
include_once('../functions.php');
$link = dbConnect();

$token = $_SESSION['token'];

$id = $_GET['id'];

$selectQuestionQuery = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM (SELECT * FROM `question` WHERE id = ".$id.") as table1 INNER JOIN person ON table1.user_id = person.id"));
if ($selectQuestionQuery['token'] == $token) {
    mysqli_query($link, "DELETE FROM question WHERE id=".$id);
}

header("Location: ../index.php");
