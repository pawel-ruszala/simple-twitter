<?php
require_once '../config.php';
require_once '../src/class/User.php';
require_once "../src/class/Tweet.php";
require_once "../src/functions/newTweet.php";
session_start();
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
    <body class="mainPage"> 
        <nav class="navbar navbar-default">
            <div class="container">
                <span class="navbar-brand">Zalogowany jako: <?php
                    $user = User::loadByUserID($conn, $_SESSION['userId']);
                    echo $user->getUsername();
                    ?> </span>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="mainPage.php">Strona główna</a></li>
                    <li><a href="#">Moje konto</a></li>
                    <li><a href="myTweets.php">Moje tweety</a></li>
                    <li><a href="#">
                            <form name="logout" method="POST" action="index.php">
                                <button type="submit" name="logout" class="btn btn-primary">Logout</button>
                            </form></a></li>
                </ul>
            </div>
        </nav>

        
        <div class="container text-center">
            <form name="newTweet" method="POST" action="#">
                <label><h1 class="newTweet">Dodaj nowego tweeta</h1><br><textarea name="tweet" placeholder="Miejsce na tweeta (do 140 znaków)" maxlength="140" rows="5" cols="25"></textarea><br>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
            </form>
        </div>
        
        
        <div class="container text-center">
            <h2>Wszystkie Twoje tweety!</h2>
            <?php
            $tweetsList = Tweet::loadAllTweetsByUserId($conn, $_SESSION['userId']);
            $tweetList = array_reverse($tweetsList, true);
            foreach ($tweetList as $tweet) {
            ?>
            <div class="container">    
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6"> 
                        <div class="panel panel-success">
                            <div class="panel-heading">Autor: <?php $user = User::loadByUserID($conn, $tweet->getUserId()); echo $user->getUsername();  ?> </div>
                            <div class="panel-body"><?php echo $tweet->getText(); ?></div>
                            <div class="panel-footer">Komentarze</div>
                        </div>
                    </div>
                    <div class="col-sm-3"> 
                    </div>
                </div>
            </div>
                    <?php }
                    ?>
        </div>
    </body>
</html>