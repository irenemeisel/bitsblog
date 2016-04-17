<?php
session_start();

include_once "control/Paths.php";
$paths = Paths::getInstance();
require_once($paths->getPathOf("user"));

//create a user only if there's a session
$session = new USER();
	
// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
// put this file within secured pages that users (users can't access without login)
if(!$session->isLoggedIn()){
	// session no set redirects to login page
    $session->redirect('index.php');
}
