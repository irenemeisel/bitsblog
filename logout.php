<?php

    include_once "control/Paths.php";
    $paths = Paths::getInstance();
    require_once($paths->getPathOf("session"));
    require_once($paths->getPathOf("user"));

	$user_logout = new USER();
	
	if($user_logout->isLoggedIn()!="")
	{
		$user_logout->redirect('index.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->logout();
		$user_logout->redirect('login.php');
	}
