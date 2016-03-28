<?php
  	session_start();
	require_once("../database.php");
	require_once("../user.php");
  	require_once("../post.php");
  	include("../views/pageblocks.php");

	if(USER::isLoggedIn()!="true")
	    //$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
	{
	 USER::redirect('login.php');
	}

	getHeader();
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head> -->
<body>

<!--getPostName($_Get['id'])'-->

	<!-- NavBar -->
  	<?php getNavbar();?>
  	<div class="clearfix"></div>
    	  
	<!-- Main Body -->
	<div class="container-fluid">
		<article>

	  <h1 ">Hello World!</h1>
	  <p class = "small">Resize the browser window to see the effect.</p>
	  <div class="row">
	    <div class="col-sm-1" style="background-color:lavender;"></div>
	    <div class="col-sm-10" style="background-color:lavenderblush;">
	    	<div class="row">
				<p>ID: <?php echo $_GET['id'] ?> </p>
				<p>Title: titletext </p>
				<p> By: authorname </p>
				<p> Date: date </p>
			</div>

	    	<div class="row">

				<div class="col-sm-4" style = "background-color:white;"><img src = "../images/fractal.jpg"> </></div>


				<div class="col-sm-8" style="background-color:plum;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation test link ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate another link velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make link again with longer anchor text a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with test link the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </div>
	    	</div>
	    </div>
	    <div class="col-sm-1" style="background-color:lavender;"></div>
	  </div>
		</article>
	</div>



</body>
</html>
