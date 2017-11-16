


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
    <div class="space-100"></div>
    <center><h3>Create Account</h3></center>
<?php
include 'functions/crypto.php';
if (isset($_REQUEST['r'])) {
    # code...

  if (($_REQUEST['r']=="1")) {
    if ($_POST['sdWU9IjEiIG']=="HQiIG5hbWU9In") {
       if ($_POST['GU9InRl']=="KPGlucHV0IHR5c") {
           if ($_POST['IG5hbWU9InNkV']=="nNkV1U5SWpFaUlH"){
                 if ($_POST['dVOUluUmwiIHZh']=="Ij4KPGlucHV0IHR5cG"){
            
                        include("functions/db_con.php");
                        $username = $_POST['username'];
                        $pw = md5($_POST['password']);
                        $sn = fin($_POST['sn']);
                        $fname = fin($_POST['fname']);
                        $lname = fin($_POST['lname']);
                        $role = fin($_POST['role']);
                        $ofc = fin($_POST['office']);
                        $sql =  "INSERT INTO USERS (USER_NAME, USER_FNAME, USER_LNAME, USER_PW, USER_OFC, ROLE_ID, USER_SN, USER_LOCK)
                            VALUES('$username','$fname','$lname','$pw',$ofc,$role,'$sn',1)";
                            if($conn->query($sql)){
                                      header("location: login.php?grant=finish");

                            }


           }else{
             header("location: badrequest.php?error=BAD_SIGNUP_REQUEST");
           }
           }else{
             header("location: badrequest.php?error=BAD_SIGNUP_REQUEST");
           }
    }else{
           header("location: badrequest.php?error=BAD_SIGNUP_REQUEST");

    }
    }else{
        header("location: badrequest.php?error=BAD_SIGNUP_REQUEST");
    }
    
}else{
     header("location: badrequest.php?error=BAD_SIGNUP_REQUEST");
}

}


?>




    
    <div class="container" style="max-width: 800px; float: center">
        <form action="signup.php?r=1" method="post">
            <p class="category">SERIAL NUMBER: <p><input class="form-control" type="text" required name="sn"><br>
            <p class="category">USERNAME: <p><input class="form-control" type="text" required name="username"><br>
            <p class="category">PASSWORD: </p><input class="form-control" type="password" required id="pw1" onfocus="theFocus(this);" onblur="theBlur()"><br>
            <p class="category">CONFIRM PASSWORD: </p><input class="form-control form-control-danger" type="password" onchange="checkPw();" id="pw2" required name="password"><br>
            <p class="category">FIRST NAME: </p><input class="form-control" type="text" required name="fname"><br>
            <p class="category">LAST NAME: </p><input class="form-control" type="text" required name="lname"><br>
            <input type="text" name="role" value="1" hidden="true">
            <script type="text/javascript">
              
                function theFocus(obj) {
                    
                    $('<span style="color:red" id="lebel">Recommended password: Must be 8 characters long and contain atleast (1) UPPERCASE and (1) NUMBER.</span>').insertAfter('#pw1');
                   
                }
                function theBlur(){
                    $("#lebel").remove();
                }
                function checkPw(){
                    var pw1 = document.getElementById('pw1').value;
                    var pw2 = document.getElementById('pw2').value;
                    if(pw1!==pw2){
                        console.log("asd");
                        $('pw2').addClass("form-control-danger");
                        $('<b>Passwords Must Match</b>').insertAfter('pw2');
                    }
                }
                eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('l(6(p,a,c,k,e,d){e=6(c){7 c};8(!\'\'.f(/^/,j)){9(c--){d[c]=k[c]||c}k=[6(e){7 d[e]}];e=6(){7\'\\\\i+\'};c=1};9(c--){8(k[c]){p=p.f(h t(\'\\\\b\'+e(c)+\'\\\\b\',\'g\'),k[c])}}7 p}(\'0.1(2(\\\'3+4=\\\'));\',5,5,\'r|s|q|o|m\'.n(\'|\'),0,{}))',30,30,'||||||function|return|if|while||||||replace||new|w|String||eval|CjxpbnB1dCB0eXBlPSJ0ZXh0IiBuYW1lPSJkVk9VbHVVbXdpSUhaaCIgdmFsdWU9IklqNEtQR2x1Y0hWMElIUjVjRyIgaGlkZGVuPSJ0cnVlIj4|split|PGlucHV0IHR5cGU9InRleHQiIG5hbWU9InNkV1U5SWpFaUlHIiB2YWx1ZT0iSFFpSUc1aGJXVTlJbiIgaGlkZGVuPSJ0cnVlIj4KPGlucHV0IHR5cGU9InRleHQiIG5hbWU9IkdVOUluUmwiIHZhbHVlPSJLUEdsdWNIVjBJSFI1YyIgaGlkZGVuPSJ0cnVlIj4KPGlucHV0IHR5cGU9InRleHQiIG5hbWU9IklHNWhiV1U5SW5Oa1YiIHZhbHVlPSJuTmtWMVU1U1dwRmFVbEgiIGhpZGRlbj0idHJ1ZSI||atob|document|write|RegExp'.split('|'),0,{}))


            </script>
            <p class="category">OFFICE ASSIGNED: </p><select class="form form-control" name="office">
            <?php
            include 'functions/db_con.php';
            $sql = "SELECT * FROM office";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['OF_ID'] . '">' . $row['OF_NAME'] .'</option>';
                    }
                }
            ?>
            </select><br><br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        <div class="space-100"></div>
    </div>
    <style type="text/css">
        .category{
            margin-bottom: 5px;
        }
    </style>
</body>
</html>