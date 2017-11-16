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



x_log("access", $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);



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
   
</head>
<body>
    
  
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
                       
                        if ($person->user_role > 2) {
                         ?>
<a class="nav-link" href="admin.php" title="Admin">
                            <i class="now-ui-icons business_bank"></i>
                            <p id="adm">Admin</p>
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
    
   <!-- End Navbar -->
<br>
   <div class="space-100"></div>
<div class="main">
    <div class="panel">
        <div class="container">
               
        <div class="category text-primary" align="center">SEARCH USERS</div>
    
        <input type="text" class="form-control " placeholder="Type to search people" id="person" list="peoplelist" onchange="gotoMsg()" onclick="document.getElementById('person').value='';" >

            <datalist id="peoplelist">
<?php

$sql = "SELECT USER_NAME FROM users where USER_LOCK=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<option value="'. $row['USER_NAME'] .'"/>';
    }
}
?>
           

            </datalist>
    <hr>
     <div class="category text-primary" align="center">UNREAD MESSAGES</div>
     <div class="unread">
        <br>
         <span id="overhere"></span>
     </div>
    </div>
    </div>
    <div class="max">
         <button class="btn btn-success" style="width: 28%;float: right" onclick="gotoMsg();">Refresh</button>
          <iframe  src="" id="content1" name="content1" onmouseover="yamete()" onmouseleave="kimochi()">  </iframe>
          <hr>
          <span>Enter your message(max 200 chars)</span>
          <textarea type="text" id="msg" placeholder="Your message here..." maxlength="200" style="width: 70%; border-radius: 10px; padding: 10px;"></textarea><br>
          <button class="btn btn-success" style="width: 28%;float: right" onclick="fireMsg();">Send</button>
          
    </div>
</div>
   
</body>



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
    var go = true;
    function kimochi(){
        go = true;
    }
    function yamete(){
        go = false;
    }
    function getUnread(){
        $.ajax({
                        url: "functions/unread.php",
                        type: "post",
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                $("#unread").remove();
                                for (var i = 0, len = data.length; i < len; i++) {
                                    $('<a id="unread" class="category text-primary" onclick="summon(\'' + data[i] + '\');" href="functions/getmsgs.php?r=' + data[i] + '" target="content1">' + data[i] + '</a>').insertAfter("#overhere");
                                }
                                
                            }
                        }
                    });
    }
    getUnread();
    function summon(s){
        document.getElementById('person').value=s
    }
    function fireMsg(){
                var msg = document.getElementById("msg").value;
                var u = document.getElementById('person').value;
                if ((msg=="") || (u=="")) {
                  //  alert("Oops! Mind checking your inputs?")
                }else{
                var dt = {}
                dt.TO = u
                dt.BODY = msg
                $.ajax({
                        url: "functions/sendmsg.php",
                        type: "post",
                        dataType: 'json',
                        data: dt,
                        success: function(data) {
                            if (data.return) {
                                document.getElementById("msg").value = "";
                                gotoMsg();

                            } else {
                                alert("Something went wrong. Mind trying again?");
                            }
                        }
                    });
                }
                
                
              }
   function gotoMsg(){
    if (go) {
        getUnread();
        var who = document.getElementById('person').value;
        if (who!="") {
            document.getElementById('content1').src = "functions/getmsgs.php?r=" + who;
        }
    }
    
    
   }
</script> 
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
        getUnread();
        gotoMsg();
        $.ajax({
            url: "functions/isadm.php",
            success: function(data){
                if (data.return) {
                    var msga = document.getElementById('adm').value;
                    msga = msga + ' (*)'; 
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





<style type="text/css">
a:hover{
    
        color: white
    
    
}
iframe{
    flex-grow: 1; margin: 0; padding: 0;border-color: #f0f0f0;border-width: 2px;border-radius: 5px;background-color: white;
}
.max{
    max-width:74%;
    min-height: 500px;
    float: right;
    overflow-y: scroll;
    display: flex; width: 100%; height: 100%; flex-direction: column;  overflow: hidden;
}
    .panel{
        max-width: 25%;
        float: left;
        min-height: 100%;
    }
    .tblcontent:hover{
        color: white;
        background-color: #41533b;
    }
</style>
</html>