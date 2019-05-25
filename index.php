<?php include_once('header.php'); ?>
<?php
$query = 'SELECT * FROM `question`';
$arrayQuestion = mysqli_query($link, $query);
?>
<div class="col-md-8">
  <div class="row" style="min-height:100vh; padding:7px; margin-top: 10px;">
    <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
      <div class="row" style="margin-bottom:10px; margin-top: 10px">
        <div class="col-md-12">
          <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" href="#">Date</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Comment</a>
            </li>
          </ul>
        </div>
      </div>
      <?php foreach ($arrayQuestion as $question) : ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="min-width:100%">
              <div class="card-body">
                <h5 class="card-title">Question title <?= $question['title'] ?> <span style="float: right"><?= $question['date'] ?></span></h5>
                <p class="card-text"></p>
                <a href="questionPage.php?id=<?= $question['id'] ?>" class="btn btn-primary">Go to question</a>
              </div>
            </div>
          </div>
        </div>
      <? endforeach ?>
    </div>
  </div>
</div>
<?php include_once('footer.php'); ?>