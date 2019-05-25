<?php

include_once('../functions.php');

$link = dbConnect();

$title =  mysqli_real_escape_string($link, $_POST['title']);
$description = mysqli_real_escape_string($link, $_POST['description']);
$user_id = $_POST['user_id'];
$id = $_POST['id'];

$updateQuery = "UPDATE `question` SET `user_id` = '$user_id', `title` = '$title', `description` = '$description', `date` = CURRENT_TIMESTAMP WHERE `question`.`id` = $id ";
mysqli_query($link, $updateQuery);

header("Location: ../editquestion.php?id=".$id);
