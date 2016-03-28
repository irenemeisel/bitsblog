<?php
 session_start();
	require_once("database.php");
	require_once("user.php");

  include("views/pageblocks.php");



if(USER::isLoggedIn()!="true") {
	USER::redirect('login.php');
}
	echo '<p>'.USER::getName().'</p>';

	getHeader();
	getNavbar();
?>

<body>
	<div class="container"> 
		<h2>Write a new post</h2>
		<div class="row">
			<div class="col-md-12">
				<form name="createPost" action="processPost.php" enctype="multipart/form-data" method="POST">
					<div class="form-group">	

						<p>
							<label for="post_title">Post title:</label><br>
							<input type="text" id="post_title" name="title"  value="title" />
						</p>
						<p>
							<label for="post_content">Post content:</label><br>
							<textarea rows="4" cols="50" name="body" id="post_content">Enter post here...</textarea>
						</p>
						<p>
							<div class="userInstruction">Allowed file types: PNG, JPG, GIF, TIFF</div>
							<label for='uploadImage'>Pick a File</label>
							<input type='file' name='uploadImage' />
						</p>
						<p>
							<input type="submit" class="btn btn-primary" value="Save" />
						</p>

					</div>
			
				</form>
			</div>
		</div>
	</div>
</body>
</html>