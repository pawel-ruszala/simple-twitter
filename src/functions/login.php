<?php

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

function login()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        global $conn;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $conn->prepare('SELECT * FROM Users WHERE email=:email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (true == password_verify($password, $user['hash_pass'])) {
                echo "<a href='mainPage.php'>Log in success. Go to main page.</a>";
                $_SESSION['userId'] = $user['id'];
            } else {
                echo "<a href='index.php'>Incorrect email or password. Go back to login page.</a>";
            }
        }
    }
}
