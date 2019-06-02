<?php

function dbConnect() {
    return mysqli_connect("127.0.0.1", "admin", "Vg68oBd2JFEb", "web");
}

function topicOwner($questionId) {
    $link = dbConnect();

    $sql = "SELECT * FROM `booked` INNER JOIN person ON booked.booked_user_id = person.id WHERE booked.question_id = $questionId";

    return mysqli_fetch_array(mysqli_query($link, $sql))['login'];
}
