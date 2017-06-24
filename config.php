<?php

$host = 'localhost';
$user = 'root';
$password = 'coderslab';
$dbname = 'twitter_1';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

if ($conn->errorCode() != null) {
    die("Połączenie nieudane..." . $conn->errorInfo()[2] . "<br>");
}
//define('HOST', 'localhost');
//define('USER', 'root');
//define('PASSWORD', 'coderslab');
//define('DBNAME', 'twitter_1');