<?php
session_start();
$title = $_POST['title'];
$code = $_POST['code'];
$language_id = $_POST['language_label_id'];
$user_id = $_SESSION['userId'];
$id = $_POST['id'];
$query = "UPDATE `question` SET `title`='$title',`code`='$code',`language_label_id`='$language_id' WHERE id='$id'";
$link = mysqli_connect("127.0.0.1", "root", "", "web");
mysqli_query($link, $query);
header('Location: ../editQuestion.php?id=' . $id);
