<?php


class Database
{

    private $stmt;
    
    public static function dbconnection()
    {
        $conn = NULL;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=myCustomCMS", "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }

    public function query($query)
    {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($stmt);
    }
}