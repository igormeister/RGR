<?php include_once('header.php'); ?>
<?php
$query = 'SELECT * FROM `language_labels`';
$languages = mysqli_query($link, $query);
##echo $_SERVER['PHP_SELF'];
?>

<div class="col-md-8">
  <div class="row" style="min-height:100vh; padding:7px; margin-top: 10px;">
    <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
      <div class="row" style="margin-bottom:10px; margin-top: 10px">
        <div class="col-md-12" style="text-align:center">
          <h1>Question form</h1>
        </div>
        <div class="col-md-12" style="text-align:center;min-height:100vh">
          <form action="system/updateQuestion.php" method="POST">
            <div class="form-group">
              <input type="hidden" value='<?= $id ?>' name='id'>
              <label for="questionName">Input question name</label>
              <input type="text" class="form-control" id="questionName" name='title' value='<?= $chek['title'] ?>'>
            </div>
            <div class="form-group">
              <label for="questionTextarea">Enter question</label>
              <textarea class="form-control" id="questionTextarea" rows="25" name='code'><?= $chek['code'] ?></textarea>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Languages</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name='language_label_id'>
                <?php foreach ($languages as $language) : ?>
                  <option value=<?= $language['id'] ?>><?= $language['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('footer.php'); ?>