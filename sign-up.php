<?php

include_once "control/Paths.php";
$paths = Paths::getInstance();
require_once($paths->getPathOf("pageblocks"));


?>

<form class="form-group" method="post" name="registration-form" action="/control/registrationscript.php"
      id="registration-form">


    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Enter Username"
               value="<?php if (isset($error)) {
                   echo $username;
               } ?>"/>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Enter E-Mail"
               value="<?php if (isset($error)) {
                   echo $email;
               } ?>"/>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter Password"/>
    </div>
    <div class="clearfix"></div>
    <hr/>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="signup">
            <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
        </button>
    </div>
    <br/>
    <label>have an account ! <a href="<?php echo $paths->getPathOf("login");?>">Sign In</a></label>
</form>
