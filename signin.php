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
    <form class="form-signin" method="POST" action="system/system_sign_in.php">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
            <p>Enter your login and password</p>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="login">
            <label for="inputEmail">Login</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
            <label for="inputPassword">Password</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Tatyana Kovaluk</p>

        <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p class="mt-5 mb-3 text-center" style="color:red">Password or login incorrect</p>
        <?php endif; ?>

    </form>
</body>

</html>