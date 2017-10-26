
<?php  include 'con-db.php'; 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title id=" ">RETURN THE NAME OF THE USER HERE</title>
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
<body class="profile-page sidebar-collapse">
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top">
       <div class="container">
           <div class="navbar-translate">
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-bar bar1"></span>
                   <span class="navbar-toggler-bar bar2"></span>
                   <span class="navbar-toggler-bar bar3"></span>
               </button>

               <a class="navbar-brand" href="/index.html" rel="tooltip">
                
               </a>
           </div>
           <div class="collapse navbar-collapse justify-content-end" id="navigation" >
               <ul class="navbar-nav">
                   
                   <li class="nav-item">
                       <a class="nav-link" href="./files.php">
                           <i class="now-ui-icons files_paper"></i>
                           <p>Files</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="messages.php">
                           <i class="now-ui-icons ui-1_email-85"></i>
                           <p>Messages</p>
                       </a>
                   </li>
                   <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                   <li class="nav-item">

                       <a class="nav-link" href="#">
                           <i class="now-ui-icons ui-1_settings-gear-63"></i>
                           <p>Settings</p>
                       </a>
                   </li>
                   
               </ul>
           </div>
       </div>
   </nav>
       
   <div class="wrapper"><div class="space-50"></div></div>
    <!-- Navbar -->

    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/bg1.jpg');"></div>
            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img src="sheri.jpg" alt="">
                    </div>
                    <h3 class="profileid title">Sheribels</h3> <!--return the profile details here-->
                    <p class="category">G6 Office</p>
                     
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="button-container">
                    
                    <a href="messages.php" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Send me a message.">
                        <i class="now-ui-icons ui-1_send"></i>
                    </a>

                </div>
                <h3 class="title">About me</h3>
                <h5 class="description">Some details here</h5>
        </div>        
            </div>
        <div class="profilepane  ">
                <div class="pane1">
                    <div class="pinnedfiles">
                        <div ><h4 >Pinned Files &nbsp; </h4>
                        
                        </div>
                        <div style="padding-left: 3%;padding-right: 3%; text-align: left;">
                        <table class="table" >
                        <tbody>
                            <tr><th>File ID</th><th>File Name</th><th>Nick Name</th></tr>
                            <tr class="tb" data-toggle="modal" data-target="#myModal"><td>43248</td><td>Test File.docx</td><td>What Nick name?</td></tr>
                        </tbody>
                        </table>
                         </div>
             
                    </div>
                    </div>
                
                <div class="pane2">
                  <div ><h4 >Timeline &nbsp;</h4></div>
                  <div style="padding-left: 3%;padding-right: 3%; text-align: left;">
                  <table class="table" >
                        <tbody>
                            <tr><th>File ID</th><th>Name</th><th>Uploader</th><th>Date</th><th>Metatags</th></tr>
                            <tr><td>43248</td><td>Test File.docx</td><td>Juan Luna</td><td>10/17/2017 7:53PM</td><td>Test File.docx</td>
                            </tr>
                        </tbody>
                        </table>
                  </div>      
                </div>

            </div>    
        </div>
    </div>
    
    </div>    
    <div class="navbottom">
      <a href="bop2.php"  rel="tooltip" title="Upload a new File?">
        <i class="now-ui-icons files_paper"></i>
      </a>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="../assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
