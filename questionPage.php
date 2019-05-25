<?php include_once('header.php'); ?>
<?php
$pageId = $_GET['id'];
$query = "SELECT * FROM `question` WHERE id='$pageId'";
$echoPage = mysqli_fetch_array(mysqli_query($link, $query));
?>
<div class="col-md-8">
  <div class="row" style="min-height:100vh; padding:7px; margin-top: 10px;">
    <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
      <div class="row" style="margin-bottom:10px; margin-top: 10px">
        <div class="col-md-12">
          <h1 style="text-align:center"><?= $echoPage['title'] ?></h1>
          <?= $echoPage['code'] ?>
          <div class="row" style="margin-top:10px">
            <a href="editQuestion.php?id=<?= $echoPage['id'] ?>" type="button" class="btn btn-primary">Edit question</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('footer.php'); ?>