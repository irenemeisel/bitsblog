<?php

require_once('database.php');
require_once('user.php');

$user = new USER();

if (isset($_POST['signup'])) {
    $username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    if ($username == "") {
        $error[] = "provide username !";
    } else if ($email == "") {
        $error[] = "provide email id !";
    }
    //else if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
    //   $error[] = 'Please enter a valid email address !';
    //}
    else if ($password == "") {
        $error[] = "provide password !";
    } else if (strlen($password) < 6) {
        $error[] = "Password must be atleast 6 characters";
    } else {
        if (USER::userExists($username, $email)) {
            $error[] = "sorry username already taken !";
        }
        else {
            if (USER::register($username, $email, $password)) {
                header('index.php');
            }
        }
    }
}
?>