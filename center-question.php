<?php

$id = $_GET['id'];
$question = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM question WHERE id=" . $id));

$allComments = mysqli_query($link, "SELECT *, table1.id as tid FROM (SELECT * FROM comment WHERE question_id=" . $id . ") as table1 INNER JOIN person ON table1.user_id = person.id ");

if (isset($person['id'])) {
    $checkIfBooked = mysqli_query($link, "SELECT * FROM booked WHERE question_id = " . $id);
    $bookedInfo = mysqli_fetch_array($checkIfBooked);
    $checked = mysqli_num_rows($checkIfBooked);
}

?>

<div class="col-md-7 example-height">
    <div class="row">
        <div class="col-md-12">
            <div class="inner-block">

                <?php if (isset($person['id']) && $checked == 0 && $isPersonBook == 0):?>
                    <a href="system/system_book_question.php?booked_user_id=<?= $person['id'] ?>&questionId=<?= $id ?>" class="btn btn-primary" style="margin-bottom:10px;">Book topic</a>
                <?php endif; ?>

                <?php if (isset($person['id']) && $bookedInfo['booked_user_id'] == $person['id']) : ?>
                    <a href="system/system_unbook_question.php?booked_user_id=<?= $person['id'] ?>&questionId=<?= $id ?>" class="btn btn-primary" style="margin-bottom:10px;">UnBook topic</a>
                <?php endif; ?>
                

                <h4 style="color:#0094f9"><?= topicOwner($id) ?></h4>
                <h4 style="color:#0094f9"><?= $question['title'] ?></h4>
                <?= $question['description']; ?>
                <hr>
                <?php if ($allComments != NULL) : ?>
                    <?php foreach ($allComments as $comment) : ?>
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <p class="card-text"><?= $comment['comment'] ?><span style="float:right"><?= $comment['login'] ?></span></p>
                                <p><?= $comment['date'] ?></p>
                                <?php if (isset($person['id']) && $comment['user_id'] == $person['id']) : ?>
                                    <a href="system/system_del_comment.php?id=<?= $comment['tid'] ?>&question_id=<?= $question['id'] ?>" class="card-link">Delete</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (isset($person['id'])) : ?>
                    <form method="post" action="system/system_add_comment.php">
                        <input type="hidden" name="question_id" value="<?= $question['id'] ?>">
                        <input type="hidden" name="user_id" value="<?= $person['id'] ?>">
                        <textarea class="form-control" name="comment"></textarea>
                        <button type="submit" class="btn btn-success" style="margin-top:5px;">Add</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>