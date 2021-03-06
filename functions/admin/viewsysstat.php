
<?php

session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}
include("../class/userclass.php");
$person = new User;
    $person = unserialize($_SESSION['user']);

    if ($person->user_role < 2) {
        header("location: badrequest.php?error=RESTRICTED_ACCESS");
    }


  ?>
  <script type="text/javascript">
    parent.iframeLoaded();
</script>
 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="icon" sizes="76x76" href="../../assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="../../assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/now-ui-kit.css" rel="stylesheet" />
 <body>
 <table class="table">
     <tr><th>System Disk Size</th><td><?php echo `df | tail -1` ?></td></tr>
     <tr><th>Server CPU Utilization</th><td><?php echo `grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage "%"}'` ?></td></tr>
     <tr><th>Server Time</th><td><?php echo `date | head -1 ` ?></td></tr>
     <tr><th>Uptime</th><td><?php echo `uptime` ?></td></tr>
     <tr><th>Number of CPUs</th><td><?php echo `grep processor /proc/cpuinfo | wc -l` ?></td></tr>
     <tr><th>Last Reboot</th><td><?php echo `last reboot | head -1` ?></td></tr>
 </table>
 
 </body>
 </html>