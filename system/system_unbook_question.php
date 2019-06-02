<?php

include_once('../functions.php');

$link = dbConnect();

$questionId = $_GET['questionId'];
$booked_user_id = $_GET['booked_user_id'];

$checkIfBooked = mysqli_query($link, "SELECT * FROM booked WHERE booked_user_id = ".$booked_user_id);
$checked = mysqli_num_rows($checkIfBooked);

$sql = "DELETE FROM booked WHERE booked_user_id = $booked_user_id";

if ($checked == 1) mysqli_query($link, $sql);

header('Location: ../question.php?id='.$questionId);
