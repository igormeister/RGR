<?php
$selectRightQuestion = mysqli_query($link, "SELECT * FROM question WHERE question.id NOT IN (SELECT question_id from booked)");
?>

<div class="col-md-3 example-height">
    <div class="inner-block">
        <h4 style="color:#0094f9">Free topics:</h4>
        <?php foreach ($selectRightQuestion as $question) : ?>
            <div class="card text-white bg-success mb-3" style="max-width: 100%;">
                <div class="card-header"><a href="question.php?id=<?=$question['id']?>" style="color: white"><?= $question['title'] ?></a></div>
                <div class="card-body ellipsis">
                    <?= $question['description'] ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>