<?php
    session_start();
    require_once("database.php");
    require_once("user.php");
    require_once("post.php");
    include("views/pageblocks.php");
//not sure why new user is created, need to get rid of this
//need an admin page and an index page
//commenting out the below temporarily cause not sure what it's for + it's fucking shit up
	//$userId = $_SESSION['user_session'];
	//$stmt = $auth_user->runQuery("SELECT * FROM usersTest WHERE userId=:userId");
	//$stmt->execute(array(":userId"=>$userId));
	
	//$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  // $user = new USER();

  // echo '<p>'.USER::getUserName().'</p>';
  // echo '<p>'.USER::getId().'</p>';


  getHeader();
  getNavbar();
?>

<body>

  <!-- NavBar -->

  <div class="clearfix"></div>
    	  
  <!-- Main Body -->
  <div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    <h2>Posts</h2>          
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Body</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php Post::retrievePosts();?>
      </tbody>
    </table>
    <ul class="pagination">
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
    </ul>
  </div>




      <!-- :: because static function-->
       
        
    <p class="blockquote-reverse" style="margin-top:200px;">
    footer<br /><br /></p>
    <a href="">footer link</a>
    </p>
  
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>