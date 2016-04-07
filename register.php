<?php
session_start();

require_once('database.php');
require_once('user.php');
$user = new USER();

if($user->isLoggedIn()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['signup']))
{
	$username 	= strip_tags($_POST['username']);
	$email 		= strip_tags($_POST['email']);
	$password 	= strip_tags($_POST['password']);	
	
	if($username=="")	{
		$error[] = "provide username !";	
	}
	else if($email=="")	{
		$error[] = "provide email id !";	
	}
	//else if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
	 //   $error[] = 'Please enter a valid email address !';
	//}
	else if($password=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($password) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT userName, userEmail FROM usersTest WHERE userName=:username");
			$stmt->execute(array(':username'=>$username));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['userName']==$username) {
				$error[] = "sorry username already taken !";
			}
			//else if($row['userEmail']==$umail) {
			//	$error[] = "sorry email id already taken !";
			//}
			else
			{
				if($user->register($username,$email,$password)){	
					$user->redirect('register.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bits Blog Sign up</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Sign up</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
			?>

</body>
</html>