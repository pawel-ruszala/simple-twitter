<?php

class Tweet
{

    private $id;
    private $userId;
    private $text;
    private $creationDate;

    public function __construct()
    {
        $this->id = -1;
        $this->userId = "";
        $this->text = "";
        $this->creationDate = "";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    static public function loadTweetById(PDO $conn, $id)
    {
        $stmt = $conn->prepare('SELECT * FROM Tweets WHERE id=:id');
        $result = $stmt->execute(['id' => $id]);

        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $tweet = new Tweet();
            $tweet->id = $row['id'];
            $tweet->userId = $row['user_id'];
            $tweet->text = $row['text'];
            $tweet->creationDate = $row['creation_date'];

            return $tweet;
        }

        return null;
    }

    static public function loadAllTweetsByUserId(PDO $conn, $userId)
    {
        $stmt = $conn->prepare('SELECT * FROM Tweets WHERE user_id=:userid');
        $result = $stmt->execute(['userid' => $userId]);
        $return = [];

        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $tweet = new Tweet();
                $tweet->id = $row['id'];
                $tweet->userId = $row['user_id'];
                $tweet->text = $row['text'];
                $tweet->creationDate = $row['creation_date'];

                $return[] = $tweet;
            }

            return $return;
        }

        return null;
    }

    static public function loadAllTweets(PDO $conn)
    {
        $result = $conn->query('SELECT * FROM Tweets');
        $return = [];

        if ($result !== false && $result->rowCount() > 0) {
            foreach ($result as $row) {
                $tweet = new Tweet();
                $tweet->id = $row['id'];
                $tweet->userId = $row['user_id'];
                $tweet->text = $row['text'];
                $tweet->creationDate = $row['creation_date'];

                $return[] = $tweet;
            }
            return $return;
        }

        return null;
    }

    public function saveToDB(PDO $conn)
    {
        if ($this->id == -1) {
            $stmt = $conn->prepare('INSERT INTO Tweets(user_id, text, creation_date) VALUES(:userId, :text, :creationDate)');

            $result = $stmt->execute(['userId' => $this->userId, 'creationDate' => $this->creationDate, 'text' => $this->text]);
            
            if ($result !== false) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            $stmt = $conn->prepare('UPDATE Tweets SET user_Id=:userId, text=:text, creation_date=:creationDate WHERE id=:id');
            $result = $stmt->execute(['id' => $this->id, 'userId' => $this->userId, 'creationDate' => $this->creationDate, 'text' => $this->text]);

            if ($result === true) {
                return true;
            }
        }
        
        return false;
    }

}

//CREATE TABLE Tweets(
//id int NOT NULL AUTO_INCREMENT,
//user_id int NOT NULL,
//text varchar(255),
//creation_date DATE,
//PRIMARY KEY(id),
//FOREIGN KEY(user_id)
//REFERENCES Users(id)
//);
