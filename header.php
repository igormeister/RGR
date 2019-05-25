<?php
session_start();
$link  = mysqli_connect("127.0.0.1", "root", "", "web");
if ($_SERVER['PHP_SELF'] == '/editQuestion.php') {
  $id = $_GET['id'];
  $sql = "SELECT * FROM `question` WHERE id='$id'";
  $chek = mysqli_fetch_array(mysqli_query($link, $sql));
  if ($chek['user_id'] != $_SESSION['userId']) {
    header('Location: index.php');
  }
}
if (isset($_SESSION['userId'])) {
  $currentId = $_SESSION['userId'];
  $query = "SELECT `id`, `name`, `surname`, `login`, `email`, `password` FROM `person` WHERE `id`=$currentId";
  $person = mysqli_fetch_array(mysqli_query($link, $query));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/tinymce/jquery.tinymce.min.js"></script>
  <script src="js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea'
    })
  </script>
  <title>YourCode.com</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">YourCode</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <?php if (!isset($_SESSION['userId'])) : ?>
          <li class="nav-item active" style="margin-right:10px">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#signInModal">
              Log in
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#signUpModal">
              Sign up
            </button>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['userId'])) : ?>
          <li class="nav-item">
            <a href="system/logOut.php" type="button" class="btn btn-outline-light">
              Log out
            </a>
          </li>
        <?php endif; ?>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <!-- Modal -->
  <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signInModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="system/autorization.php" method="POST">
            <div class="form-group">
              <label for="signInInputEmail">Email address</label>
              <input type="email" class="form-control" id="signInInputEmail" aria-describedby="emailHelp" placeholder="Enter email" name='email'>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                else.</small>
            </div>
            <div class="form-group">
              <label for="signInInputPassword">Password</label>
              <input type="password" class="form-control" id="signInInputPassword" placeholder="Password" name='password'>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signUpModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="system/registration.php" method='POST'>
            <div class="form-group">
              <label for="signUpInputEmail">Email address</label>
              <input type="email" class="form-control" id="signUpInputEmail" aria-describedby="emailHelp" placeholder="Enter email" name='email'>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                else.</small>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="login" name='login'>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" placeholder="First name" name='name'>
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Last name" name='surname'>
              </div>
            </div>
            <div class="form-group">
              <label for="signUpInputPassword">Password</label>
              <input type="password" class="form-control" id="signUpInputPassword" placeholder="Password" name='password'>
              <label for="signUpInputPassword">Repeat password</label>
              <input type="password" class="form-control" id="signUpInputPassword" placeholder="Password" name='repeatPassword'>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" style="margin-top: 50px;background-color:#dcdbdb;">
    <div class="row">
      <div class="col-md-2">
        <div class="row" style="min-height:100vh; padding:7px; margin-top: 10px;">
          <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
            <?php if (isset($_SESSION['userId'])) : ?>
              <div class="jumbotron">
                <h3>Hello,
                  <? echo $person['login'] ?>!</h3>
                <p class="lead">Name
                  <? echo $person['name'] ?>
                </p>
                <p class="lead">Surname
                  <? echo $person['surname'] ?>
                </p>
                <p class="lead">email
                  <? echo $person['email'] ?>
                </p>
                <p class="lead">Comments
                  <? echo $_SESSION['userId'] ?>
                </p>
                <hr class="my-4">
                <button type="button" class="btn btn-secondary btn-lg btn-block">Show my question</button>
              </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['userId'])) : ?>
              <div class="row">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">Change
                  profile data</button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <a href="question.php" type="button" class="btn btn-primary btn-lg btn-block">Create new question</a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>