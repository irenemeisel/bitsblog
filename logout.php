<?php
	require_once('session.php');
	require_once('user.php');
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
