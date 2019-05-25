<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#0094f9">
        <a class="navbar-brand" href="index.php">YourCode</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <?php if(!isset($token)): ?>
                <li class="nav-item active">
                    <a class="btn btn-light" href="signin.php">Sign in</a>
                </li>
                <li class="nav-item active">
                    <a class="btn btn-light" href="signup.php">Sign up</a>
                </li>
                <?php endif; ?>

                <?php if(isset($token)): ?>
                <li class="nav-item active">
                    <a class="btn btn-light" href="system/system_log_out.php">Log out</a>
                </li>
                <?php endif; ?>
            </ul>
            <form class="form-inline mt-2 mt-md-0" method="GET" action="index.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>