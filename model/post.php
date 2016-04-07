<?php
require_once("database.php");
require_once("user.php");

//make sure user is logged in
//how to automatically create user when use post class???
//is database connection connected to user or is post


class Post
{
    public $id;
    public $date;
    public $userID;
    public $title;
    public $body;
    public $conn;
    public $imageName;
    public $imagePath;

    public function __construct($title, $body, $date = null)
    {
        //( $data=array() )

        $this->date = is_null($date) ? date("Y-m-d H:m:s") : $date;
        $this->title = $title;
        $this->body = $body;
        $this->userID = User::getId();
        //assign database connection to each new post
    }
    //$this is for non-static, self:: for static
    //or  $database = new Database();

    public function save()
    {
        try {
            // Open database connection    
            $conn = Database::dbConnection();

            $sql = "INSERT INTO posts (date, userID, title, body) values (:date, :userID, :title, :body)";
            $statement = $conn->prepare($sql);
            //$test = 5;
            $statement->bindParam(':date', $this->date, PDO::PARAM_STR);
            $statement->bindParam(':userID', $this->userID, PDO::PARAM_STR);
            $statement->bindParam(':title', $this->title, PDO::PARAM_STR);
            $statement->bindParam(':body', $this->body, PDO::PARAM_STR);
            $statement->execute();
            $conn = null;

            // Get affected rows
            $count = $statement->rowCount();

            // Return affected rows
            return $count;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }


//turned into static function so don't have to instantiate post class
    public static function retrievePosts()
    {
        $conn = Database::dbConnection();
        $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 5";

        foreach ($conn->query($sql) as $post) {
            echo '<tr id=' . $post['id'] . '>' .
                '<td>' . $post['title'] . '</td>' .
                '<td>' . $post['body'] . '</td>' .
                '<td>' . $post['date'] . '</td>' .
                '</tr>';
        }
        $conn = null;


    }

    //retrieve posts by a particular user
    public static function retrieveUserPosts()
    {
        if (User::isLoggedIn()) {
            $conn = Database::dbConnection();
            $sql = "SELECT * FROM posts WHERE userID='$userID' ORDER BY id desc LIMIT 5";

            foreach ($conn->query($sql) as $post) {
                echo '<tr>' .
                    '<td>' . $post['title'] . '</td>' .
                    '<td>' . $post['body'] . '</td>' .
                    '<td>' . $post['date'] . '</td>' .
                    '</tr>';
            }
        } else {
            retreivePosts();
        }

        $conn = null;

    }
}


