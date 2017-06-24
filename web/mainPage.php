<?php
require_once '../config.php';
require_once '../src/class/User.php';
require_once "../src/class/Tweet.php";
require_once "../src/functions/newTweet.php";
session_start();
newTweet($conn);
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
    <body> 
<!--  <div class="jumbotron">
    <h1>Witam na Simple Twitter!</h1>   
  </div>-->

            
        
        <nav class="navbar navbar-default">
            <div class="container">
                <span class="navbar-brand">Zalogowany jako: <?php $user = User::loadByUserID($conn, $_SESSION['userId']);
echo $user->getUsername();
?> </span>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Moje konto</a></li>
                    <li><a href="#">Moje tweety</a></li>
                    <li><a href="#">
                            <form name="logout" method="POST" action="index.php">
                                <button type="submit" name="logout" class="btn btn-primary">Logout</button>
                            </form></a></li>
                </ul>
            </div>
        </nav>

            
        <div class="container text-center">
            <form name="newTweet" method="POST" action="#">
                <label><h3>Dodaj nowego tweeta</h3><br><textarea name="tweet" placeholder="Miejsce na tweeta (do 140 znaków)" maxlength="140" rows="5" cols="25"></textarea><br>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

        <div class="container text-center">
            <h2>Wszystkie tweety!</h2>
            <?php
            $tweetsList = Tweet::loadAllTweets($conn);
            foreach ($tweetsList as $tweet) {
                echo "<div class='container text-center img-rounded' id='tweetBox'>" . $tweet->getText() . "</div>";
            }
            ?>
        </div>
    </body>
</html>