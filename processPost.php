<?php
	session_start();

	require_once("post.php");
	require_once("user.php");


	//? include user class
	//? include post class &/or do whatever it is that needs to get done so that all classes load automatically
	// include($_SERVER['DOCUMENT_ROOT'].'/myCustomCMS/includes/functions.php');
	// if($user->isLoggedIn()!="true")

	// 	if (isAuthenticated()) { 
	// 	include($_SERVER['DOCUMENT_ROOT'].'/myCustomCMS/includes/dbConnect.php');
	// 	}

	//move this stuff to post class
	//when create a post you're instantiating post class
	//insert whole object into database

		if (isset($_POST['title']) && isset($_POST['body'])) { 	
			$title = $_POST['title'];
			$body = $_POST['body'];
		//	$date = date("Y-m-d");
			$post = new Post($title, $body);
			$post->save();
			echo "right on";
		}
	
 		//get database connection
 		//insert post
	
				// $query = "INSERT INTO post(id, dateNOW, userID, title, body) VALUES(NULL, '$dateNOW', '$userID', '$title', '$body')";
				// mysqli_query($con, $query);																																

				// //printf("Affected rows (INSERT): %d\n", mysqli_affected_rows($con));
				// if (mysqli_affected_rows($con)>1) {
				// echo '<script> location.replace("http://localhost:8000/myCustomCMS/index.php"); </script>';
				// 	// echo "right on!!! \n \n"; 
				// 	// header("Refresh: 5; url=http://localhost:8000/myCustomCMS/index.php");
				
				// }


				//else 
				//		echo "try again!";
	

?>