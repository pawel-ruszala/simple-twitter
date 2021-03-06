<?php
require_once '../config.php';
require_once '../src/class/User.php';
require_once '../src/class/Tweet.php';
require_once '../src/functions/logout.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHPipper</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="index">
        <div class="container contIndex">
            <p><?php logout(); ?></p>
            <form action="login.php" method="POST" class="form-signin">
                <label>Your email <input type="text" name="email" placeholder="email" class="form-control"></label>
                <label>Your password <input type="password" name="password" placeholder="password" class="form-control"></label><br>
                <button type="submit" name="button" value="login" class="btn btn-primary">Log in</button>
                <a href="signup.php">Don't have an account? Sign up here!</a>
            </form>
        </div>
    </body>
</html>
