<?php

require_once('database.php');
//or make User class an extension of database connection class
//or have User class *implement* database connection class?
//something about making the database class an interface and not a class
//don't want user to be  cause then there's only one user for instance for a databse class when you need only one
//USER:: for  vs $irene->$eyeColor
//each user logs in only once so one user per browser
//already user logged in and sh

class User
{

    private static $conn;

    public function __construct()
    {
    }

    public static function register($username, $email, $password)
    {
        try {
            $newPassword = password_hash($password, PASSWORD_DEFAULT);

            $conn = Database::dbconnection();
            $stmt = $conn->prepare("INSERT INTO users(userName,userEmail,userPass) VALUES(:username, :email, :password)");

            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $newPassword);

            $stmt->execute();

            return ($stmt->rowCount() == 1) ? true : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public static function login($userName, $password)
    {
        try {
            // TODO: FIX LOGIN PROCESS (add password!!!)
            $conn = Database::dbconnection();

            $stmt = $conn->prepare("SELECT userId, userName, userEmail FROM users WHERE userName=:userName AND userPass=:password");
            $stmt->execute(array(':userName' => $userName, ':password' => $password));

            $conn = null;

            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() == 1) {
                $_SESSION['userId'] = $userRow['userId'];
                $_SESSION['userName'] = $userRow['userName'];
                $_SESSION['userEmail'] = $userRow['userEmail'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public static function getConnection()
    {
        return self::$conn;
    }

    public static function isLoggedIn()
    {
        if (isset($_SESSION['userId'])) {
            return true;
        }
        return false;
    }

    public static function userExists($username, $email)
    {
        try {
            $conn = Database::dbconnection();
            $stmt = $conn->prepare("SELECT userName FROM users WHERE userName=:username OR userEmail=:email");
            $stmt->execute(array(':username' => $username, ':email' => $email));
            $stmt->fetch(PDO::FETCH_ASSOC);
            return ($stmt->rowCount() > 0) ? true : false;
        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }


    public static function getId()
    {
        return $_SESSION['userId'];
    }

    public static function getuserName()
    {
        return $_SESSION['userName'];
    }

    public static function getName()
    {
        // return $_SESSION['name'];
        return 'Not set';
    }

    public static function redirect($url)
    {
        header("Location: $url");
    }

    public static function logout()
    {
        //TODO: Check that everything gets deleted
        session_destroy();
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);
        return true;
    }

}
