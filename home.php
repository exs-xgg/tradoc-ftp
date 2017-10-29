<?php  include 'con-db.php'; 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Home </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-kit.css" rel="stylesheet" />
    <link href="./assets/css/msg-css.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet" />
</head>
<body style="background-color: lightred ">

    
</div>    
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top navbar-transparent">
        <div class="container">
            <div class="logo-trad">
                  <a href="index.php" title="Home">
                    <i class=""> <img src="./assets/img/tradoc_logo.png"></i>
                  </a>
            </div>
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="/index.html" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Admin">
                            <i class="now-ui-icons business_bank"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./files.php" title="Files">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Files</p>
                        </a>
                    </li>
                     
                </ul>
            </div>
        </div>
    </nav>
 
<div class="main">
    <div class="wrapper">  
      <div class="modal-content">
           <div class="page-header clear-filter" filter-color="orange" style="background-image: url('/assets/img/bg1.jpg');">
            <div style="background-image: url('/assets/img/header.jpg');"></div>
            <div class="welcome_animate page-header-image" data-parallax="true" style="background-image: url('/assets/img/header.jpg'); transform: translate3d(0px, 17.6667px, 0px);">
            </div>
            <div class="container">
                <div class="content-center brand">
                    <img class="n-logo" src="./assets/img/tradoc_logo.png" alt="">
                    <h1 class="h1-seo">Welcome!</h1>
                    <h3 class="h1-seo">TRADOC-PA WebPortal</h3>
                </div>
                 
            </div>
            </div>
       </div>
      <div class="login-body">
        <div class="login-form" align="center">
<br><br>
<form class="form" method="POST" action="./functions/login_auth.php">
    <h4 class="title title-up upper">TRADOC WEB PORTAL</h4>
                                <div class="header header-primary text-center">
                                    <h4 class="title title-up">Sign In</h4>
                                </div>
                                <div class="content">
                                    
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_single-02">&nbsp;</i>
                                        </span>
                                        <input type="text" name="id" class="form-control" placeholder="ID">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_lock-circle-open">&nbsp;</i>
                                        </span>
                                        <input type="password" name ="pwd" placeholder="PIN" class="form-control">
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-neutral btn-round btn-lg">Login</button>
                                </div>
                            </form>
                    </div>
      </div>    
    </div>
    
</div>

</body>
</html>