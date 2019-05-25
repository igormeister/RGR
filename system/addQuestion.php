<?php
session_start();
$title = $_POST['title'];
$code = $_POST['code'];
$language_id = $_POST['language_label_id'];
$user_id = $_SESSION['userId'];
$query = "INSERT INTO `question`(`id`, `user_id`, `title`, `code`, `best_comment_id`, `language_label_id`, `date`) VALUES (NULL,'$user_id','$title','$code',NULL,'$language_id',CURRENT_TIMESTAMP)";
$link = mysqli_connect("127.0.0.1", "root", "", "web");
mysqli_query($link, $query);
header('Location: ../index.php');
