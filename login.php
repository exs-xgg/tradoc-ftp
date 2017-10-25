<?php
    session_start();
   
?>
<!DOCTYPE html>
<html>
<head>

    <title></title>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Now Ui Kit by Creative Tim</title>
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
<form class="form" method="POST" action="./loginphp.php">
    <h4 class="title title-up upper">TRADOC FILE ARCHIVING SYSTEM</h4>
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
        background-color: #27ae60;
        color: black;
        border-radius: 20px;
        box-shadow: 2px 2px 10px gray;
        padding: 10px;

    }
    input{
        background-color: white
    }
    .btn:hover{
        background-color: orange;
        color: white
    }
</style>
