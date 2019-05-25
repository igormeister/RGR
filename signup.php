<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourCode</title>
    <?php include_once('css-links.php') ?>
    <link rel="stylesheet" href="/css/signin.css">
</head>

<body>
    <form class="form-signin" method="POST" action="system/system_sign_up.php">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
        </div>

        <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
            <label for="inputEmail">Email</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputLogin" class="form-control" placeholder="Login" required name="login">
            <label for="inputLogin">Login</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
            <label for="inputPassword">Password</label>
        </div>
        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password again" required name="passwordAgain">
            <label for="inputPassword">Password again</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Tatyana Kovaluk</p>

        <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p class="mt-5 mb-3 text-center" style="color:red">Passwords are different</p>
        <?php endif; ?>

        <?php if(isset($_GET['error']) && $_GET['error'] == 2): ?>
        <p class="mt-5 mb-3 text-center" style="color:red">Email has been already used</p>
        <?php endif; ?>

        <?php if(isset($_GET['error']) && $_GET['error'] == 3): ?>
        <p class="mt-5 mb-3 text-center" style="color:red">Login has been already used</p>
        <?php endif; ?>
    </form>
</body>

</html>