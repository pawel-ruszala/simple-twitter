<?php

function signup ($conn)
{
    
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
    
        $stmt = $conn->prepare('SELECT * FROM Users WHERE email=:email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user['email'] == $email){
            echo "Email zajęty";
            
        } elseif ($user === false) {
            $newUser = new User;
            $newUser->setEmail($email);
            $newUser->setHashPass($password);
            $newUser->setUsername($username);
            $newUser->saveToDB($conn);
            var_dump($newUser);
            $_SESSION['userId'] = $newUser->getId();
            var_dump($_SESSION);
            echo "<a href='mainPage.php'>Pomyślnie założono konto. Kliknij aby przejść do strony głownej.<a>";
    }
        
    }
    
}