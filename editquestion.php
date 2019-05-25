<?php include_once('top.php'); ?>
<?php
    if (!isset($person)) {
        header('Location: index.php');
    } else {
        $selectQuestion = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM question WHERE id ='".$_GET['id']."'"));
        if ($person['id'] != $selectQuestion['user_id']) {
            header('Location: index.php');
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourCode</title>
    <?php include_once('css-links.php') ?>
</head>

<body>
    <?php include_once('header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('left-side.php'); ?>
            <?php include_once('center-edit-question.php'); ?>
            <?php include_once('right-side.php'); ?>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>