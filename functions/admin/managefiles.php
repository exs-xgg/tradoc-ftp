
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

//"SELECT * FROM files WHERE F_UPLOAD_DATE > DATE_SUB(NOW(),INTERVAL 5 YEAR)
  ?>

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
    <link href="../../assets/css/msg-css.css" rel="stylesheet" />
 <body>
    <div class="alert alert-info" role="alert">
        <div class="container">
            
            <strong>SEARCH FILE</strong> 

        </div>
    </div>
    <div style="background-color: white">
        <form action="#">
                <div class="container">
                    <?php if (isset($_REQUEST['q'])) {
                            echo '<p>'. 'Top 5 results returned for keyword "' . $_REQUEST['q'] . '"</p>';
                        }?>
                    <div class="input-group form-group-no-border" >
                        <input class="form-control" type="text" name="q" placeholder="Enter keyword here..." style="font-size: 15px;" <?php if (isset($_REQUEST['q'])) {
                            echo 'value="'. $_REQUEST['q'] . '"';
                        }?>>
                        <span class="input-group-addon" ><button class="btn btn-primary btn-round" type="submit"><i class="now-ui-icons ui-1_zoom-bold"></i>&nbsp;Search</button></span></form>
                        
                    </div>
                
                
                </div>
            </div>
 <div id="files" style="padding-left: 5%;padding-right: 5%">
                <table class="table">
                <tr><th>Tracking No.</th><th>Document Name</th><th>Date Uploaded</th><th>Uploaded By</th><th>Uploaded From</th><th width="30%">Document Tags</th></tr>


                <?php 
                if (isset($_REQUEST['q'])) {
                    include '../db_con.php'; 
                    $q = $_REQUEST['q'];
                    $sql = "SELECT * FROM file INNER JOIN users ON file.F_UPLOADER =users.USER_ID where file.F_TRACK_NO like '%$q%' ORDER BY file.F_UPLOAD_DATE DESC LIMIT 5 ";
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
                        echo $tag_decode;
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

                        
                        <a href=<?php echo '"modfile.php?filex='.$row['F_ID'].'"'; ?> target="_blank" class="btn btn-default" ><b>Edit</b></a>

                        <a href=<?php echo '"download.php?filex='.$row['F_NAME_SERVER'].'"'; ?> target="_blank" class="btn btn-info" ><b>Download</b></a>

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
 <div class="alert alert-danger" role="alert">
        <div class="container">
            
            <strong>FILES THAT HAVE REACHED 5 YEARS IN SERVER</strong> 

        </div>
    </div>
    <div style="padding-left: 5%;padding-right: 5%">
        <table class="table">
                <tr><th>Tracking No.</th><th>Document Name</th><th>Date Uploaded</th><th>Uploaded By</th><th>Uploaded From</th><th width="30%">Document Tags</th></tr>


                <?php 
             
                    include '../db_con.php'; 
                    $sql = "SELECT * FROM file INNER JOIN users ON file.F_UPLOADER =users.USER_ID WHERE file.F_DATE_LAST_CHECKED > DATE_SUB(NOW(),INTERVAL 5 YEAR) ORDER BY file.F_UPLOAD_DATE DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        $tags = json_decode($row["F_TAGS"]);

                        echo '<tr class="tb"  data-toggle="modal" data-target="#e'. $row["F_ID"] .'" id="#e'. $row["F_ID"] .'"><td>' . $row["F_TRACK_NO"]. '</td><td>' .  $row["F_NAME_ORIG"] . "</td><td>" . $row["F_UPLOAD_DATE"] . '</td><td>' . $row["USER_FNAME"]. " ". $row["USER_LNAME"] . '</td><td>'. $row['F_OFFICE'] .'</td><td>';
                        $tag_decode = "";
                        for ($i=0; $i < count($tags); $i++) { 
                            $tag_decode .= '<span class="badge badge-primary">' . $tags[$i] . '</span>&nbsp;';
                        }
                        echo $tag_decode;
                        echo '</td></tr>';
                        ?>


            <div class="modal fade" <?php echo 'id="e'.$row["F_ID"].'"'?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                        <button type="button" class="btn btn-info" onclick="stayFile(<?php echo "'" . $row["F_ID"] . "'"; ?>);"><b>Retain</b></button>

                         <button type="button" class="btn btn-danger" onclick="deleteFile(<?php echo "'" . $row["F_ID"] . "'"; ?>);"><b><b>Delete</b></a>

                        <button type="button" class="btn btn-neutral" data-dismiss="modal"><i class="now-ui-icons ui-1_simple-remove"></i><b>&nbsp;&nbsp;Close</b></button>
                    </div>
                </div>
             </div>
            </div>

                        <?php 

                    }
                } else {
                   
                }
            $conn->close();



                
               

                ?>
                

                </table> 
    </div>
    
<script src="../../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../../assets/js/now-ui-kit.js" type="text/javascript"></script>
<script type="text/javascript">
    parent.iframeLoaded();

    function deleteFile(fid){
        var fidr = "e"+fid;
        alert(fidr);
        $.ajax({
            url: "deleteFile.php?fid="+fid, 
            success: function(data) {
                
                    $(fidr).remove();
                
            }
        });
    }
    function stayFile(fid){
        console.log(fid);   
        var uurl = "stayFile.php?fid="+fid;
        console.log(uurl);
        $.ajax({
            url: uurl,
            success: function(data) {
                
                    alert("File retained");
                
            }
        });
        
    }
</script>
 </body>
 </html>