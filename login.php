<?php
    session_start();
    $_SESSION['times'] = 0;
   if ((isset($_SESSION['user']))) {
       header("location: files.php");
   }
   if (isset($_REQUEST['grant'])) {
       # code...
    if (($_REQUEST['grant'])=="false") {


    ?>
<nav class="navbar navbar-toggleable-md bg-danger">
                            <div class="container">
                                <div class="navbar-translate">
                                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#example-navbar-danger" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-bar bar1"></span>
                                        <span class="navbar-toggler-bar bar2"></span>
                                        <span class="navbar-toggler-bar bar3"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">INVALID CREDENTIALS</a>
                                </div>
                                <div class="collapse navbar-collapse justify-content-end" id="example-navbar-danger">
                                    
                                </div>
                            </div>
                        </nav>
    <?php 
   }

   if (($_REQUEST['grant']=="true")){
        if(isset($_REQUEST['mark']) && ($_REQUEST['mark'] == $_SESSION['mark'])){

//JUST LEAVE THIS HERE

}else{
    header("location: ./badrequest.php?error=LOGIN_FINGERPRINT_MISMATCH");
}

   }

   }
   
?>


<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Log In - TRADOC PORTAL</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet" />

</head>
<body>
	
    <div class="login-form" align="center">
<br><br>
<form class="form" method="POST" action="./functions/login_auth.php">
    <h4 class="title title-up upper">TRADOC WEB PORTAL</h4>
                                <div class="header header-primary text-center">
                                    <h4 class="title title-up">Sign In</h4>
                                </div>

                                <div class="content">
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon" style="background: white;">
                                            <i class="now-ui-icons users_single-02">&nbsp;</i>
                                        </span>
                                        <input type="text" name="user_name" class="form-control" placeholder="Username" style="background-color: white;"">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                       <span class="input-group-addon" style="background: white;">
                                            <i class="now-ui-icons ui-1_lock-circle-open">&nbsp;</i>
                                        </span>
                                        <input type="password" name ="passwd" placeholder="Password" class="form-control" style="background-color: white;"">
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-info btn-lg">Login</button>
                                    <br><br>
                                    <a class="btn btn-neutral" href="signup.php">Create Account</a>
                                </div>


                            </form>
                    </div> 
</body>
</html>

<style type="text/css">
.login-form{
        width: 100%;
        float: center;
        background-color: ;     
    }
    .upper{
        color: white;
    }
    body{
    background-image: url('http://cf.c.ooyala.com/1jcGtkYjE605slwPizeVEx_-_EBbKCuR/promo320279649');
    display: table;
    position: relative;
    width: 100%;
    height: 100%;
   
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
            }
    form{
        width: 40%;
        background-color: #41533b;
        color: black;
        border-radius: 20px;
        /*box-shadow: 2px 2px 10px gray;*/
        padding: 10px;

    }
    input{
        background-color: white
    }
    .btn:hover{
        background-color: #B8B8B8;
        color: white
    }
</style>
  