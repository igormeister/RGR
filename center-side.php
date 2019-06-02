<?php
$selectAllQuestion = mysqli_query($link, "SELECT * FROM question");

if (isset($_GET['usersQuestions']) && $_GET['usersQuestions'] == 1 and isset($person)) {
    $selectAllQuestion = mysqli_query($link, "SELECT * FROM question INNER JOIN (SELECT question_id, booked_user_id FROM booked) as booked1 ON question.id = booked1.question_id WHERE booked_user_id =".$person['id']);
}

if (isset($_GET['search'])) {
    $selectAllQuestion = mysqli_query($link, "SELECT * FROM question WHERE title LIKE '%".$_GET['search']."%' OR description LIKE '%".$_GET['search']."%'");
}

?>

<div class="col-md-7 example-height">
    <div class="inner-block">
        <h4 style="color:#0094f9">All topics:</h4>
        <?php foreach ($selectAllQuestion as $question) : ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 100%;">
                <div class="card-header">
                    <a href="question.php?id=<?=$question['id']?>" style="color: white"><?= $question['title'] ?></a>
                    <?php if (isset($person['id']) && $person['login'] == 'admin') : ?>
                        <div style="float: right">
                            <a href="editquestion.php?id=<?=$question['id']?>" class="btn btn-warning">Edit</a>
                            <a href="system/system_del_question.php?id=<?=$question['id']?>" class="btn btn-danger">X</a>
                        </div>
                    <?php endif; ?>
                    <span style="float: right"><?=topicOwner($question['id'])?></span>
                </div>
                <div class="card-body ellipsis">
                    <?= $question['description'] ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>