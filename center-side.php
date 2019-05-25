<?php
$selectAllQuestion = mysqli_query($link, "SELECT * FROM question");
?>

<div class="col-md-7 example-height">
    <div class="inner-block">
        <h4 style="color:#0094f9">All questions:</h4>
        <?php foreach ($selectAllQuestion as $question) : ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 100%;">
                <div class="card-header"><?= $question['title'] ?></div>
                <div class="card-body ellipsis">
                    <?= $question['description'] ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>