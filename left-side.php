<div class="col-md-2 example-height">
    <div class="inner-block">
        <div class="left-inner-inner-block">
            <img src="img/avatars/1.png" alt="..." class="img-thumbnail">
            <?php if (isset($person)): ?>
            <h4>Hello, <?=$person['login']?>!</h4>
            <h5><?=$person['email']?></h5>
            <?php endif; ?>
        </div>
        <?php if (isset($person) and $person['login'] == 'admin'): ?>
        <a href="createquestion.php"><button type="button" class="btn btn-warning" style="margin-top:10px; width: 100%">Create question</button></a>
        <a href="system/clearquestions.php"><button type="button" class="btn btn-warning" style="margin-top:10px; width: 100%">Clear owners</button></a>
        <?php endif; ?>
        <?php if (isset($person)): ?>
            <a href="index.php?usersQuestions=1"><button type="button" class="btn btn-warning" style="margin-top:10px; width: 100%">Your questions</button></a>
        <?php endif; ?>
    </div>
</div>