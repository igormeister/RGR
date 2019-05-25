<?php

include_once('../functions.php');

$link = dbConnect();

$question_id = $_POST['question_id'];
$user_id = $_POST['user_id'];
$comment = mysqli_real_escape_string($link, $_POST['comment']);

$insertQuery = "INSERT INTO `comment` (`id`, `comment`, `user_id`, `question_id`, `date`) VALUES (NULL, '$comment', '$user_id', '$question_id', CURRENT_TIMESTAMP)";

mysqli_query($link, $insertQuery);

header('Location: ../question.php?id='.$question_id);
