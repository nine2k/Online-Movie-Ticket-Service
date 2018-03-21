<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gold City Movies</title>
    <meta name="keywords" content="movie,theatre,login" />
    <meta name="description" content="Login to purchase tickets" />
    <link rel="icon" href="">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/jquery-1.11.3.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" rev="stylesheet" type="text/css" media="all" href="./css/login.css">
    <script src="./js/jquery.validate.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body><form class="main-box" role="form" action="login_process.php" method="post">
    <h3 class="form-header">User Login</h3>
    <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="pwd">Password: </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>


    <div class="checkbox">
        <label>
            <input name="remember" value="yes" type="checkbox"> Remember Login
        </label>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
    <a class="extra" href="">Sign up</a><a class="extra" href="">Forgot your password?</a><a class="extra" href="">Back to homepage</a>
</form>

</body>
</html>
