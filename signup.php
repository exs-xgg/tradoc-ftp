


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
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $role = $_POST['role'];
                        $ofc = $_POST['office'];
                        $sql =  "INSERT INTO USERS (USER_NAME, USER_FNAME, USER_LNAME, USER_PW, USER_OFC, ROLE_ID, USER_LOCK)
                            VALUES('$username','$fname','$lname','$pw',$ofc,$role,1)";
                            if($conn->query($sql)){
                                       ?>

<nav class="navbar navbar-toggleable-md bg-success">
                            <div class="container">
                                <div class="navbar-translate">
                                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#example-navbar-danger" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-bar bar1"></span>
                                        <span class="navbar-toggler-bar bar2"></span>
                                        <span class="navbar-toggler-bar bar3"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">SIGNUP COMPLETE. Please wait for the Administrator to approve your account request.</a>
                                </div>
                                <div class="collapse navbar-collapse justify-content-end" id="example-navbar-danger">
                                    
                                </div>
                            </div>
                        </nav>
                                       <?php 

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
            <p class="category">USERNAME: <p><input class="form-control" type="text" required name="username"><br>
            <p class="category">PASSWORD: </p><input class="form-control" type="password" required name="password"><br>
            <p class="category">FIRST NAME: </p><input class="form-control" type="text" required name="fname"><br>
            <p class="category">LAST NAME: </p><input class="form-control" type="text" required name="lname"><br>
            <input type="text" name="role" value="1" hidden="true">
            <script type="text/javascript">
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