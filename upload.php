

<?php

if (isset($_REQUEST['success'])) {
   if ($_REQUEST['success']=="yes") {
      ?>
<nav class="navbar fixed-bottom bg-success " id="notif" onclick="$('#notif').hide('slow');">
                            <div class="container">
                                <div class="navbar-translate">
                                     <a class="navbar-brand" href="#">FILE UPLOAD SUCCESSFUL</a>
                                </div>
                                <div class="collapse navbar-collapse justify-content-end" id="example-navbar-danger">
                                    
                                </div>
                            </div>
                        </nav>
<?php
   }else{

?>

<nav class="navbar fixed-bottom bg-danger" id="notif" onclick="$('#notif').hide('slow');">
                            <div class="container">
                                <div class="navbar-translate" data-dismiss="modal">
                                     <a class="navbar-brand" href="#">FILE UPLOAD FAILED OR IS INVALID</a>
                                </div>
                                <div class="collapse navbar-collapse justify-content-end" id="example-navbar-danger">
                                    
                                </div>
                            </div>
                        </nav>


<?php

   }
}


?>
<?php  
include('functions/class/userclass.php');
include('functions/crypto.php');
session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}

if (isset($_REQUEST['id'])) {
  
} else {

$person = unserialize($_SESSION['user']);



x_log("Accessed " .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);
}
?>




<html lang="en"><head>
    <meta charset="utf-8">
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Files</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/now-ui-kit.css" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet">
</head>




<body style="padding-right: 33px;" class="modal-open">

          <nav class="navbar navbar-toggleable-md bg-primary fixed-top">
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
                <a class="navbar-brand" href="index.php" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php 
                        if ($person->user_role > 2) {
                         ?>
<a class="nav-link" href="admin.php" title="Admin">
                            <i class="now-ui-icons business_bank"></i>
                            <p>Admin</p>
                        </a>

                         <?php 
                        }
                        ?>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./files.php" title="Files">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Files</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./messages.php" title="Messages">
                            <i class="now-ui-icons ui-1_email-85"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php" title="Profile">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Settings">
                            <i class="now-ui-icons ui-1_settings-gear-63"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout();">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- End Navbar -->

<div class="space-50">
    
</div>
    <div class="wrapper">

         
    </div>
    <div class="main">
        <div class="container cnt">
           <h4 class="title title-up white">Upload File</h4>
                    
                    <form action="functions/post_file.php" method="post" enctype="multipart/form-data" id="uploadform">
                    <input class="mytext white" name="filex" id="filex" type="file"><br><br>
                    <input class="mytext" name="filetrack" maxlength="200"  placeholder="File Tracking No." type="text"></input><br>
                            <textarea class="mytext" name="desc" maxlength="200"  placeholder="File Description (Max 200)" type="text" form="uploadform"></textarea><br>
                        
                       
                            <textarea class="mytext" id="tags" name="tags" maxlength="200"  placeholder="Tags (Separate each tags with ENTER)" type="text" form="uploadform"></textarea><br>
                            <br>
                            <input class="mytext" name="password" maxlength="200"  placeholder="Your Password" type="password"></input>
                            <br>
                             <button name="submit" value="Submit" class="btn btn-info mytext" type="submit">Upload</button>
                        
                             </div>
                             
                      
                    </div>
                        
<style type="text/css">
    .title{
        margin-top: 0px;
    }
    .white{
        color: white;
    }
    .mytext{
        padding: 10px;
        margin: 5px;
        border-radius: 10px;
        border-color: black;
        border-width: 2px;
        box-shadow: 2px 2px 2px gray;
        width: 100%
    }
    body, .main{
        background-color: #bdc3c7;
    }
    .cnt{
        width: 500px;
        float: center;
        border-radius: 20px;
        box-shadow: 2px 2px 2px gray;
        background-color: #41533b;
        padding: 20px;
    }
</style>

                    </div>
                </form>
                    </div></div>
    </div>        


<script>
   var t;

function logout() {
        window.location.href = 'logout.php';
    }

    setInterval(function(){
        $.ajax({
            url: "functions/amilocked.php",
            dataType: 'json',
            success: function(data) {
                if (data.return) {
                    logout();
                } else {
                    //alert("return is false");
                }
            }
        });
        
    }, 3000);
    clearTimeout(t);
    
    
    function idleLogout() {
   
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // catches touchscreen presses
    window.onclick = resetTimer;     // catches touchpad clicks
    window.onscroll = resetTimer;    // catches scrolling with arrow keys
    window.onkeypress = resetTimer;

    
    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout,  <?php if ($person->user_role > 2) {
                         ?>90000 );<?php }else{ ?>300000);  <?php }?>
    }
}
idleLogout();
</script>



<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js" type="text/javascript"></script>
<script type="text/javascript">
   
</script>
           

<!--UPLOAD DIALOG MODAL-->
           </body></html>