<?php

include_once('../functions.php');

$link = dbConnect();

$sql = "DELETE FROM booked";
mysqli_query($link, $sql);

header('Location: ../index.php');
