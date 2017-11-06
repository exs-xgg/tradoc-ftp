<?php  
include('functions/class/userclass.php');
include('functions/crypto.php');
include 'functions/db_con.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}

if (isset($_REQUEST['id'])) {
  
} else {

$person = unserialize($_SESSION['user']);



x_log("Accessed " .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);



//NOTES:
/*

I THINK WE SHOULD GET THE INITIAL PROFILE DATA FIRST, AND THEN TIMELINE INFO VIA AJAX 
TO LESSEN THE LOADING TIME OF THE PAGE

**/



}?>
<!DOCTYPE html>
<html lang="en">
<head>     
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Messages</title>
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
                <a class="navbar-brand" href="#" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php 
                        include("functions/class/userclass.php");
                        $person = new User;
                        $person = unserialize($_SESSION['user']);
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
                    <li class="nav-item active">
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
                        <a class="nav-link" href="settings.php" title="Settings">
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
    <script type="text/javascript">
                    function logout(){
                       var answer = confirm("Logout?");
                        if (answer) {
                            window.location.href = "./logout.php";
                        }
                        else {
                            //some code
                        }
                    }
                </script>
   <!-- End Navbar -->


   <div class="main">
    <div class="msgpanel">
                <div class"">
                </div>
                <!--message input area-->
                <div class="msg-main">
                        <div class="msg-container" align="right">
                            <div  class="otherend"><div class="messages category text-primary" align="center">messages</div> 
                            </div>                            
                        </div>                              
                    <div class="bottom"> <!--message input-->
                     <div class="msg-area" id="msg-area">&nbsp;</div>
                      <div class="input-group form-group-no-border">    
                        <input class="form-control" id="msg-input" type="text" name="msg" placeholder="Enter message here..." style="font-size: 15px;" onkeydown="if (event.keyCode==13) sendmsg();">
                    
                        <span class="input-group-addon"><button class="btn btn-primary btn-round" onclick="sendmsg();"><i class="now-ui-icons ui-1_send"></i>&nbsp;Send</button></span>          
                      </div>
                   </div>
                </div>
                <div class="msgs-sidebar" >
                <div>
                    <div class="messages category text-primary" align="center">Search</div>  <!-- Search barfor people/messages-->
                    <div class="msgretrieve"></div> <!--Placeholder for returned results of the search. Empty if no return.-->      
                </div>
                <div class="msgsearch input-group form-group-no-border">
                    <input type="text" class="form-control" placeholder="Search Messenger">
                    <span class="input-group-addon">
                        <i class="now-ui-icons ui-1_zoom-bold""></i>
                    </span>
                </div>
              </div>

    </div>
     
</body>

<script type="text/javascript">
    function sendmsg() {

            var msginput = document.getElementById("msg-input").value;
            
            if (msginput != null){
                <?php echo 'var uname = "'. $_SESSION['id'].'"'; ?> 
                  
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                  if(xmlhttp.readyState==4&&xmlhttp.status==200){
                    document.getElementById('msg-area').innerHTML = xmlhttp.responseText;                    
              }
              }
               xmlhttp.open('GET','./functions/sendmsg.php?uname='+uname+'&msg='+msginput,true);
               xmlhttp.send();
            }
      //$(document).ready(function(e){
      //    $.ajaxSetup({cache:false});
      //    setInterval(function(){$('#msg-area').load()})
     // });
}
            

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
   $(document).ready(function() {
       // the body of this function is in assets/js/now-ui-kit.js
       nowuiKit.initSliders();
   });

   function scrollToDownload() {

       if ($('.section-download').length != 0) {
           $("html, body").animate({
               scrollTop: $('.section-download').offset().top
           }, 1000);
       }
   }
</script>
<script>
var _0x22be=["\x66\x75\x6E\x63\x74\x69\x6F\x6E\x73\x2F\x61\x6D\x69\x6C\x6F\x63\x6B\x65\x64\x2E\x70\x68\x70",
    "\x6A\x73\x6F\x6E",
    "\x72\x65\x74\x75\x72\x6E",
    "\x61\x6A\x61\x78",
    "\x6F\x6E\x6C\x6F\x61\x64",
    "\x6F\x6E\x6D\x6F\x75\x73\x65\x6D\x6F\x76\x65",
    "\x6F\x6E\x6D\x6F\x75\x73\x65\x64\x6F\x77\x6E",
    "\x6F\x6E\x63\x6C\x69\x63\x6B",
    "\x6F\x6E\x73\x63\x72\x6F\x6C\x6C",
    "\x6F\x6E\x6B\x65\x79\x70\x72\x65\x73\x73",
    "\x68\x72\x65\x66",
    "\x6C\x6F\x63\x61\x74\x69\x6F\x6E",
    "\x6C\x6F\x67\x6F\x75\x74\x2E\x70\x68\x70"];
    var t;
    setInterval(function(){
        $[_0x22be[3]]({
        url:_0x22be[0],dataType:_0x22be[1],success:function(_0xe8b6x2){
        if(_0xe8b6x2[_0x22be[2]]){
        c_logout()
    }else {

        }
}
})
    },3000);
    clearTimeout(t);
    function idleLogout(){
        window[_0x22be[4]]= _0xe8b6x5;
        window[_0x22be[5]]= _0xe8b6x5;
    window[_0x22be[6]]= _0xe8b6x5;
    window[_0x22be[7]]= _0xe8b6x5;
    window[_0x22be[8]]= _0xe8b6x5;
    window[_0x22be[9]]= _0xe8b6x5;
    function _0xe8b6x4(){
        window[_0x22be[11]][_0x22be[10]]= _0x22be[12]
    }function _0xe8b6x5(){clearTimeout(t);
        t= setTimeout(_0xe8b6x4,300000)
    }
    }idleLogout()
</script>
</html>