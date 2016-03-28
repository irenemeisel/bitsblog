<?php
session_start();


//create a user only if there's a session
require_once 'user.php';
$session = new USER();
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	
if(!$session->isLoggedIn()){
		// session no set redirects to login page
$session->redirect('index.php');


}





	// public static function set($key, $value) {

	// 		$_SESSION[$key] = $value;

	// 	}



	// 	public static function get($key) {
	// 		if(isset($_SESSION[$key]))
	// 			return $_SESSION[$key];

	// 		else
	// 			return false;

	// 	}


