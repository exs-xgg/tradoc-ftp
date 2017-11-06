

<?php

if (isset($_REQUEST['success'])) {
   if ($_REQUEST['success']=="yes") {
      ?>
<script type="text/javascript">
    alert("File upload successful!");
</script>
<?php
   }else{

?>

<script type="text/javascript">
    alert("File upload unsuccessful.");
</script>


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