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
    </head>
    <body>
        <div> 
            <form name="newTweet" method="POST" action="#">
                <label>Dodaj nowego tweeta<br><textarea name="tweet" placeholder="Miejsce na tweeta (do 140 znaków)" maxlength="140" rows="5" cols="25"></textarea><br>
                    <button type="submit">Dodaj</button>
            </form>
            
            <?php
            $tweetsList = Tweet::loadAllTweets($conn);
            foreach ($tweetsList as $tweet) {
            echo "<p>" . $tweet->getText() . "</p>";    
            }
            ?>
            <form name="logout" method="POST" action="index.php">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
    </body>
</html>