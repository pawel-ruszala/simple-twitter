<?php
require_once '../config.php';
require_once '../src/class/User.php';
require_once '../src/class/Tweet.php';
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
    </head>
    <body>
        <div>
            <form action="login.php" method="POST">
                <label>Your email <input type="text" name="email" placeholder="email"></label>
                <label>Your password <input type="password" name="password" placeholder="password"></label><br>
                <button type="submit" value="login">Log in</button>
                <a href="signup.php">Don't have an account? Sign up here!</a>
            </form>
        </div>
    </body>
</html>










<?php

//echo "Połączenie udane...<br>";

//$user = new User;
//$user->setUsername("Test2");
//$user->setEmail("test3311@example.com");
//$user->setHashPass("haslo123");
//$user->saveToDB($conn);
//var_dump($user);
//$modUser = User::loadByUserID($conn, 45);
//var_dump($modUser);
//$modUser->setUsername("ModTest45");
//$modUser->setEmail("ModTest45@example.com");
//$modUser->setHashPass("pass454545");
//$modUser->saveToDB($conn);
//var_dump($modUser);
//$delUser = User::loadByUserID($conn, 44);
//$delUser ->deleteUser($conn);

//var_dump(User::loadAllUsers($conn));
