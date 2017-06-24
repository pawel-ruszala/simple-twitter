<?php 
//class User
//{
//
//    private $id = -1;
//    private $username;
//    private $email;
//    private $hashPass;
//
//    public function __construct()
//    {
//        $this->username = "";
//        $this->email = "";
//        $this->hashPass = "";
//    }
//
//    function getId()
//    {
//        return $this->id;
//    }
//
//    function getUsername()
//    {
//        return $this->username;
//    }
//
//    function getEmail()
//    {
//        return $this->email;
//    }
//
//    function setUsername(string $username)
//    {
//        $this->username = $username;
//    }
//
//    function setEmail(string $email)
//    {
//        $this->email = $email;
//    }
//
//    public function setPassword(string $password)
//    {
//        $this->hashPass = password_hash($password, PASSWORD_BCRYPT);
//    }
//
//    public function saveToDB(PDO $conn)
//    {
//        if ($this->id == -1) {
//            $sql = "INSERT INTO Users(username, email, hash_pass) VALUES (:username, :email, :hash_pass)";
//            $stmt = $conn->prepare($sql);
//            $stmt->execute([
//                ':username' => $this->username,
//                ':email' => $this->email,
//                ':hash_pass' => $this->hashPass,
//            ]);
//
//            $this->id = $conn->lastInsertId();
//            return true;
//        } else {
//            $sql = "UPDATE Users SET username = :username, email = :email, hash_pass= :hash_pass WHERE id = :id";
//            $stmt=$conn->prepare($sql);
//            return $stmt->execute([
//                        ':username' => $this->username,
//                        ':email' => $this->email,
//                        ':hash_pass' => $this->hashPass,
//                        ':id' => $this->id,
//            ]);
//        }
//    }
//
//    static public function loadUserById(PDO $conn, $id)
//    {
//        $sql = "SELECT * FROM Users WHERE id =:id";
//        $stmt = $conn->prepare($sql);
//        $result = $stmt->execute(['id' => $id]);
//
//        if ($result && $stmt->rowCount() == 1) {
//            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
//
//            $user = new User ();
//
//            $user->id = $userData['id'];
//            $user->email = $userData['email'];
//            $user->username = $userData['username'];
//            $user->hashPass = $userData['hash_pass'];
//
//            return $user;
//        } else {
//            return null;
//        }
//    }
//
//    static public function loadAllUsers(PDO $conn)
//    {
//        $sql = "SELECT * FROM Users ORDER BY id ASC";
//        $result = $conn->query($sql);
//
//        if ($result && $result->rowCount() > 0) {
//            foreach ($result->fetchALL(PDO::FETCH_ASSOC) as $userData) {
//                $user = new User ();
//
//                $user->id = $userData['id'];
//                $user->email = $userData['email'];
//                $user->username = $userData['username'];
//                $user->hashPass = $userData['hash_pass'];
//
//                $users[] = $user;
//            }
//        }
//        return $users;
//    }
//    
//    public function delete(PDO $conn)
//    {
//        if ($this->id != -1){
//            $sql = "DELETE FROM Users WHERE id = :id";
//            $stmt = $conn->prepare($sql);
//            if ($stmt->execute(['id' => $this->id])){
//                $this->id = -1;
//                
//                return true;
//            }
//        }
//    }

//}
