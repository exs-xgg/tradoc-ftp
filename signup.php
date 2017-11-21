<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CREATE ACCOUNT</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet" />



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
                
                <a class="navbar-brand" href="#" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            
        </div>


    </nav>
    <div style="height: 100px"></div>
    <center><h3>Create Account</h3></center>
<?php
include 'functions/crypto.php';
if (isset($_REQUEST['r'])) {
    # code...

  if (($_REQUEST['r']=="1")) {
    
            
                        include("functions/db_con.php");
                        $username = $_POST['username'];
                        $pw = md5($_POST['password']);
                        $sn = fin(strip_tags($_POST['sn']));
                        $fname = fin(strip_tags($_POST['fname']));
                        $lname = fin(strip_tags($_POST['lname']));
                        $role = fin(strip_tags($_POST['role']));
                        $ofc = fin(strip_tags($_POST['office']));
                        $sql =  "INSERT INTO users (USER_NAME, USER_FNAME, USER_LNAME, USER_PW, USER_OFC, ROLE_ID, USER_SN, USER_LOCK)
                            VALUES('$username','$fname','$lname','$pw',$ofc,$role,'$sn',1)";
                            if($conn->query($sql)){
                                      header("location: login.php?grant=finish");

                            }


           }

}


?>




    
    <div class="container" style="max-width: 800px; float: center">
        <form action="signup.php?r=1" method="post">
            <p class="category">SERIAL NUMBER: <p><input class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="snn" type="text" required name="sn" maxlength="10"><br>
            
           
            <p class="category">FIRST NAME: </p><input class="form-control" type="text" required name="fname" maxlength="50"><br>
            <p class="category">LAST NAME: </p><input class="form-control"  id="lln" type="text" required maxlength="50" name="lname"><br>
            <input type="text" name="role" value="1" hidden="true">

            
            <p class="category">OFFICE ASSIGNED: </p>
            <input type="text" class="form-control" name="office" placeholder="Type to search office" list="ofc" >
            <?php
            include 'functions/db_con.php';
            $sql = "SELECT * FROM office";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                        echo '<datalist id="ofc">';
                    while($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['OF_ID'] . '">' . $row['OF_NAME'] .'</option>';
                    }
                        echo '</datalist>';
                }
            ?>
            <br><br> <p class="category">USERNAME(auto-generated): <br><span class="btn btn-primary" onclick="lokk()">Generate Username</span><p><input readonly id="loks" type="text" required name="username" style="border-radius: 10px; border-color: gray;padding:4px"><br>
            <p class="category">PASSWORD: </p><input class="form-control" type="password" required id="pw1" onfocus="theFocus(this);" onblur="theBlur()"><br>
            <p class="category">CONFIRM PASSWORD: </p><input class="form-control form-control-danger" type="password" onchange="checkPw();" id="pw2" required name="password"><br><b><p id="warning" style="color:red"></p></b>
            <span class="btn btn-info" onclick="validate()">VALIDATE</span>&nbsp;&nbsp;
            <button class="btn btn-primary" type="submit" id="subb" disabled="true">Submit</button>
        </form>
        <div class="space-100"></div>
    </div>
    <style type="text/css">
        .category{
            margin-bottom: 5px;
        }
    </style>
    <script type="text/javascript">
            function validate(){
                var snc = document.getElementById("snn").value;
                if (snc.length < 6) {
                    alert("Invalid Serial Number");
                    document.getElementById("subb").disabled = true;
                }else{
                   $.ajax({
                        url: "functions/getusers.php",
                        success: function(data) {
                            var ar_sn = JSON.parse(data);
                            var foundPresent = $.inArray(snc, ar_sn) > -1;
                            if (foundPresent) {
                                alert("USER SERIAL NUMBER ALREADY EXISTS!");
                                document.getElementById("subb").disabled = true;
                            } else {
                                document.getElementById("subb").disabled = false;
                            }
                        }
                    });
                }
            }
              function lokk(){
                var ist = document.getElementById("snn").value;
                var lln = document.getElementById("lln").value;
                document.getElementById("loks").value =  lln.toLowerCase() + '_' + ist;
                }
                function theFocus(obj) {
                    
                    $('<span style="color:red" id="lebel">Recommended password: Must be 8 characters long and contain atleast (1) UPPERCASE and (1) NUMBER.</span>').insertAfter('#pw1');
                   
                }
                function theBlur(){
                    $("#lebel").remove();
                }
                function checkPw(){
                    var pw1 = document.getElementById('pw1').value;
                    var pw2 = document.getElementById('pw2').value;
                    if(pw1==pw2){
document.getElementById("subb").disabled = false;
$('#warning').text('');
                    }else{
document.getElementById("subb").disabled = true;
                        $('#warning').text('Passwords Must Match');
                    }
                        
                       
                    
                }
                


            </script>
</body>
</html>