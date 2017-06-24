<?php

function newTweet($conn)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['tweet'])) {
            $newTweet = new Tweet();
            $newTweet->setUserId($_SESSION['userId']);
            $newTweet->setText($_POST['tweet']);
            $newTweet->setCreationDate(date('Y-m-d H-i-s'));
            $newTweet->saveToDB($conn);
        }
    }
}
