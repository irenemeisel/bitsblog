<?php
session_start();

include "control/Paths.php";
$paths = Paths::getInstance();
require_once($paths->getPathOf("database"));
require_once($paths->getPathOf("user"));
require_once($paths->getPathOf("post"));
require_once($paths->getPathOf("pageblocks"));

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
                <?php Post::retrievePosts(); ?>
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

        <p class="blockquote-reverse" style="margin-top:200px;">
            footer<br/><br/></p>
        <a href="">footer link</a>

    </div>
    </div>

<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>