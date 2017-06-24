<?php

class User
{

    private $id;
    private $email;
    private $username;
    private $hashPass;

    public function __construct()
    {
        $this->id = -1;
        $this->email = "";
        $this->username = "";
        $this->hashPass = "";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getHashPass()
    {
        return $this->hashPass;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setHashPass($newPass)
    {
        $newHashedPassword = password_hash($newPass, PASSWORD_BCRYPT);
        $this->hashPass = $newHashedPassword;
    }

    public function saveToDB(PDO $conn)
    {
        if ($this->id == -1) {
            $stmt = $conn->prepare('INSERT INTO Users(username, email, hash_pass) VALUES(:username, :email, :pass)');

            $result = $stmt->execute(['username' => $this->username, 'email' => $this->email, 'pass' => $this->hashPass]);
            echo 'elo';
            if ($result !== false) {
                $this->id = $conn->lastInsertId();

                return true;
            }
        } else {
            $stmt = $conn->prepare('UPDATE Users SET username=:username, email=:email, hash_pass=:hash_pass WHERE id=:id');
            $result = $stmt->execute(['id' => $this->id, 'username' => $this->username, 'email' => $this->email, 'hash_pass' => $this->hashPass]);

            if ($result === true) {
                return true;
            }
        }

        return false;
    }

    static public function loadByUserID(PDO $conn, $id)
    {
        $stmt = $conn->prepare('SELECT * FROM Users WHERE id=:id');
        $result = $stmt->execute(['id' => $id]);

        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $user = new User();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->hashPass = $row['hash_pass'];
            $user->email = $row['email'];

            return $user;
        }

        return null;
    }

    static public function loadAllUsers(PDO $conn)
    {
        $result = $conn->query('SELECT * FROM Users');
        $return = [];

        if ($result !== false && $result->rowCount() > 0) {
            foreach ($result as $row) {
                $loadedUser = new User;
                $loadedUser->id = $row['id'];
                $loadedUser->email = $row['email'];
                $loadedUser->hashPass = $row['hash_pass'];
                $loadedUser->username = $row['username'];
                $return[] = $loadedUser;
            }

            return $return;
        }

        return null;
    }

    public function deleteUser(PDO $conn)
    {
        if ($this->id !== -1) {
            $stmt = $conn->prepare('DELETE FROM Users WHERE id=:id');
            $result = $stmt->execute(['id' => $this->id]);

            if ($result === true) {
                $this->id = -1;

                return true;
            }

            return false;
        }

        return true;
    }

}
