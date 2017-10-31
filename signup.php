


<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>INVALID REQUEST</title>
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

<input type="text" name="sdWU9IjEiIG" value="HQiIG5hbWU9In" hidden="true">
<input type="text" name="GU9InRl" value="KPGlucHV0IHR5c" hidden="true">
<input type="text" name="IG5hbWU9InNkV" value="nNkV1U5SWpFaUlH" hidden="true">
<input type="text" name="dVOUluUmwiIHZh" value="Ij4KPGlucHV0IHR5cG" hidden="true">
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
             echo '<h1>DIDNTWORKED</h1>' ;
           }
           }else{
             echo '<h1>DIDNTWORKED</h1>' ;
           }
    }else{
            echo '<h1>DIDNTWORKED</h1>' ;

    }
    }else{
        echo '<h1>DIDNTWORKED</h1>' ;
    }
    
}else{
    echo '<h1>DIDNTWORKEDasdasd</h1>' ;
}

}
?>




    
    <div class="container" style="max-width: 800px; float: center">
        <form action="signup.php?r=1" method="post">
            <p class="category">USERNAME: <p><input class="form form-control" type="text" required name="username"><br>
            <p class="category">PASSWORD: </p><input class="form form-control" type="password" required name="password"><br>
            <p class="category">FIRST NAME: </p><input class="form form-control" type="text" required name="fname"><br>
            <p class="category">LAST NAME: </p><input class="form form-control" type="text" required name="lname"><br>
            <input type="text" name="role" value="1" hidden="true">
            <script type="text/javascript">
                
var _0xfaa6=['exception','write','apply','Bja','tiZ','console','log','warn','debug','info','error','trace','zAc','Kek','Uyv','return\x20(function()\x20','fNx','SOt'];(function(_0xf50820,_0x56f041){var _0x2a9b10=function(_0x33f0f4){while(--_0x33f0f4){_0xf50820['push'](_0xf50820['shift']());}};_0x2a9b10(++_0x56f041);}(_0xfaa6,0xb6));var _0x6faa=function(_0x383627,_0x5be16e){_0x383627=_0x383627-0x0;var _0x2c16a0=_0xfaa6[_0x383627];return _0x2c16a0;};var _0x153856=function(){var _0x8fbf10=!![];return function(_0x2bd9d3,_0xb79237){var _0x2ab54e=_0x8fbf10?function(){if(_0xb79237){var _0x4d86fc=_0xb79237[_0x6faa('0x0')](_0x2bd9d3,arguments);_0xb79237=null;return _0x4d86fc;}}:function(){if(_0x6faa('0x1')!==_0x6faa('0x2')){}else{that[_0x6faa('0x3')][_0x6faa('0x4')]=_0x58c999;that['console'][_0x6faa('0x5')]=_0x19eb72;that['console'][_0x6faa('0x6')]=_0x40a2b1;that[_0x6faa('0x3')][_0x6faa('0x7')]=_0x5396db;that[_0x6faa('0x3')][_0x6faa('0x8')]=_0x27de71;that[_0x6faa('0x3')]['exception']=_0x410cb9;that[_0x6faa('0x3')][_0x6faa('0x9')]=_0x1bdb87;}};_0x8fbf10=![];return _0x2ab54e;};}();var _0x3e85ad=_0x153856(this,function(){var _0x22bec7=function(){if(_0x6faa('0xa')===_0x6faa('0xa')){}else{}};var _0x4a1b53;try{if(_0x6faa('0xb')!==_0x6faa('0xc')){var _0x220ba1=Function(_0x6faa('0xd')+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');_0x4a1b53=_0x220ba1();}else{var _0x161da6=_0x4a4c62('return\x20(function()\x20'+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');_0x308584=_0x2e5c58();}}catch(_0x1d5101){if(_0x6faa('0xe')==='fNx'){_0x4a1b53=window;}else{}}if(!_0x4a1b53[_0x6faa('0x3')]){if(_0x6faa('0xf')===_0x6faa('0xf')){_0x4a1b53[_0x6faa('0x3')]=function(_0x49dd9f){if('vWD'!=='PlT'){var _0x2f0ba2={};_0x2f0ba2[_0x6faa('0x4')]=_0x49dd9f;_0x2f0ba2[_0x6faa('0x5')]=_0x49dd9f;_0x2f0ba2['debug']=_0x49dd9f;_0x2f0ba2[_0x6faa('0x7')]=_0x49dd9f;_0x2f0ba2[_0x6faa('0x8')]=_0x49dd9f;_0x2f0ba2[_0x6faa('0x10')]=_0x49dd9f;_0x2f0ba2[_0x6faa('0x9')]=_0x49dd9f;return _0x2f0ba2;}else{if(_0xf4c56){var _0x33508d=fn[_0x6faa('0x0')](_0x544b9b,_0x2d6ec0);_0x272f1e=null;return _0x131a5c;}}}(_0x22bec7);}else{_0x5c1572=_0x432f72;}}else{if('pmd'!=='usO'){_0x4a1b53[_0x6faa('0x3')][_0x6faa('0x4')]=_0x22bec7;_0x4a1b53[_0x6faa('0x3')][_0x6faa('0x5')]=_0x22bec7;_0x4a1b53['console'][_0x6faa('0x6')]=_0x22bec7;_0x4a1b53['console'][_0x6faa('0x7')]=_0x22bec7;_0x4a1b53[_0x6faa('0x3')][_0x6faa('0x8')]=_0x22bec7;_0x4a1b53[_0x6faa('0x3')]['exception']=_0x22bec7;_0x4a1b53[_0x6faa('0x3')][_0x6faa('0x9')]=_0x22bec7;}else{var _0x1442a3=_0x9f5eb6?function(){if(_0x33840a){var _0xf2dfee=fn['apply'](_0x563f2c,_0x3e6959);_0x1b2347=null;return _0x588948;}}:function(){};_0x389754=![];return _0x3153b6;}}});_0x3e85ad();document[_0x6faa('0x11')](atob('PGlucHV0IHR5cGU9InRleHQiIG5hbWU9InNkV1U5SWpFaUlHIiB2YWx1ZT0iSFFpSUc1aGJXVTlJbiIgaGlkZGVuPSJ0cnVlIj4KPGlucHV0IHR5cGU9InRleHQiIG5hbWU9IkdVOUluUmwiIHZhbHVlPSJLUEdsdWNIVjBJSFI1YyIgaGlkZGVuPSJ0cnVlIj4KPGlucHV0IHR5cGU9InRleHQiIG5hbWU9IklHNWhiV1U5SW5Oa1YiIHZhbHVlPSJuTmtWMVU1U1dwRmFVbEgiIGhpZGRlbj0idHJ1ZSI+CjxpbnB1dCB0eXBlPSJ0ZXh0IiBuYW1lPSJkVk9VbHVVbXdpSUhaaCIgdmFsdWU9IklqNEtQR2x1Y0hWMElIUjVjRyIgaGlkZGVuPSJ0cnVlIj4='));
            </script>
            <p class="category">OFFICE ASSIGNED: </p><select class="form form-control" name="office">
            <?php
            include 'functions/db_con.php';
            $sql = "SELECT * FROM OFFICE";
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
    </div>
    <style type="text/css">
        .category{
            margin-bottom: 5px;
        }
    </style>
</body>
</html>