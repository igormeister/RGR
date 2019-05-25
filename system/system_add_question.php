<?php

include_once('../functions.php');

$link = dbConnect();

$title =  mysqli_real_escape_string($link, $_POST['title']);
$description = mysqli_real_escape_string($link, $_POST['description']);
$user_id = $_POST['user_id'];

$insertQuery = "INSERT INTO `question` (`id`, `user_id`, `title`, `description`, `best_comment_id`, `date`) VALUES (NULL, '$user_id', '$title', '$description', '0', CURRENT_TIMESTAMP)";
mysqli_query($link, $insertQuery);

$id = mysqli_insert_id($link);

header("Location: ../editquestion.php?id=".$id);
