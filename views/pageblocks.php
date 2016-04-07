<?php

function getLoginForm()
{
    ?>
    <div class="signin-form">

        <div class="container">


            <form class="form-signin" method="post" name="login-form" action="/login.php" id="login-form">

                <h2 class="form-signin-heading">Log In</h2>
                <hr/>

                <div id="error">
                    <?php
                    if (isset($error)) {
                        ?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username " required/>
                    <span id="check-e"></span>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password"/>
                </div>

                <hr/>

                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-default">
                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
                    </button>
                </div>
                <br/>
                <label>Don't have account yet ! <a href="register.php">Sign Up</a></label>
            </form>

        </div>
    </div>
    <?php
}


function getRegistrationForm()
{
    ?>

    <form class="form-group" method="post" name="registration-form" action="/registrationscript.php"
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
        <label>have an account ! <a href="../login.php">Sign In</a></label>
    </form>


    <?php
}

function getNavbar()
{
    ?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Nav Bar 1</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="">Nav Bar 2</a></li>
                    <li><a href="postForm.php">post here</a></li>
                    <li><a href=>Nav Bar 4</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Hi&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View
                                    Profile</a></li>
                            <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign
                                    Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <?php
}

function getHeader()
{
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/domHandler.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <title>welcome
        <?php
        //print($userRow['userEmail']);

        // $blog = new Blog();
        // $this->getPosts();
        // echo

        ?></title>
</head>
    <?php
}

?>