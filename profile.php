
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



}


?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title id=" "><?php  echo $person->user_fname . " " . $person->user_lname ?></title>
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
   <div class="wrapper"><div class="space-50"></div></div>
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
    <!-- Navbar -->

    <div class="wrapper">
        
        <div class="section">
            <div class="container">
                
                <h3 class="title"><?php  echo $person->user_fname . " " . $person->user_lname; ?></h3>
                <h5 class="description"><?php  echo $person->user_office; ?></h5>
              
            </div>
            <div id="files" style="padding-left: 5%;padding-right: 5%">
                <table class="table">
                <tr><th>Tracking No.</th><th>Document Name</th><th>Date Uploaded</th><th>Uploaded By</th><th>Uploaded From</th><th width="30%">File Nickname</th></tr>


                <?php 
                if (!isset($_REQUEST['id'])) {
                    include 'functions/db_con.php'; 


                    //FIX THIS QUERY

                    $sql = "SELECT * FROM pinned INNER JOIN file on pinned.PIN_FILE=file.F_ID INNER JOIN users on file.F_UPLOADER=users.USER_ID where pinned.PIN_USER=$person->user_id ORDER BY file.F_UPLOAD_DATE DESC LIMIT 20 ";





                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        $tags = json_decode($row["F_TAGS"]);

                        echo '<tr class="tb"  data-toggle="modal" data-target="#m'. $row["F_ID"] .'"><td>' . $row["F_TRACK_NO"]. '</td><td>' .  $row["F_NAME_ORIG"] . "</td><td>" . $row["F_UPLOAD_DATE"] . '</td><td>' . $row["USER_FNAME"]. " ". $row["USER_LNAME"] . '</td><td>'. $row['F_OFFICE'] .'</td><td>';
                        $tag_decode = "";
                        for ($i=0; $i < count($tags); $i++) { 
                            $tag_decode .= '<span class="badge badge-primary">' . $tags[$i] . '</span>&nbsp;';
                        }
                        echo $row['PIN_NICKNAME'];
                        echo '</td></tr>';
                        ?>


            <div class="modal fade" <?php echo 'id="m'.$row["F_ID"].'"'?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Description: <?php echo $row["F_DESC"];?></p>
                        <p>Tracking No: <?php echo $row["F_TRACK_NO"];?></p>
                        <p>Uploader: <?php echo $row["USER_FNAME"]. " ". $row["USER_LNAME"] . ", " .$row['F_OFFICE'];?></p>
                        <p>Date Uploaded: <?php echo $row["F_UPLOAD_DATE"];?></p>
                        <p>&nbsp;<?php echo $tag_decode; ?></p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary" onclick="unpinMeDaddy(<?php echo "'" . $row["F_ID"] . "'"; ?>);"><i class="now-ui-icons location_pin"></i><b>&nbsp;&nbsp;Unpin File</b></button>

                        <a href=<?php echo '"download.php?filex='.$row['F_NAME_SERVER'].'"'; ?> target="_blank" class="btn btn-info" ><i class="now-ui-icons arrows-1_cloud-download-93"></i><b>&nbsp;&nbsp;Download</b></a>

                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="now-ui-icons ui-1_simple-remove"></i><b>&nbsp;&nbsp;Close</b></button>
                    </div>
                </div>
             </div>
            </div>

                        <?php 

                    }
                } else {
                   
                }
            $conn->close();



                }
               

                ?>
                

                </table> 
            </div>
        </div>
    </div>
      
    <div class="navbottom">
      <a href="bop2.php"  rel="tooltip" title="Upload a new File?">
        <i class="now-ui-icons files_paper"></i>
      </a>
    </div>
    
</body>
<script type="text/javascript">
    function unpinMeDaddy(fid){
        var nick = "x";
        $.get("functions/pin.php?x=0&fid=" + fid + "&nick=" + nick,
            function(data,status){
                if (status=200) {
                    if (data="1") {
                        alert("Added to pinned files!");
                    }else{
                        alert("Something went wrong");
                    }
                }else{
                    alert("Something went wrong. Error " + status);
                }
                
           
            });
        
            
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
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="./assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
