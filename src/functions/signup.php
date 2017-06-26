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
            $_SESSION['userId'] = $newUser->getId();
            echo "<a href='mainPage.php' class='login'>Pomyślnie założono konto. Kliknij aby przejść do strony głownej.<a>";
    }
        
    }
    
}