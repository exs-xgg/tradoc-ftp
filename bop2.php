<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>File Upload</title>
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
<body>
 <nav class="navbar navbar-toggleable-md bg-primary fixed-top">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="/index.html" rel="tooltip" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="now-ui-icons business_bank"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./files.html">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Files</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./messages.php">
                            <i class="now-ui-icons ui-1_email-85"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="now-ui-icons ui-1_settings-gear-63"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <center>
<div class="uploadmain">
	<div class="uploadpanel" >
                <form action="functions/post_file.php" method="post" enctype="multipart/form-data">
                    <div class="header header-primary text-center">
                        <h3 class="title title-up category">UPLOAD FILE</h3>
                        <!--<i class="now-ui-icons  files_box "></i>-->
                    </div>
                    <div class="category">

						<div class="input-group form-group-no-border text-center">
                        	<span class="input-group-addon">
                        		<i class="now-ui-icons files_single-copy-04"></i>                                	
                        	</span>
                        	<input type="text" name="desc" maxlength="200" class="form-control" placeholder="File Description (Max 200)">
                        
                   		 </div>
                   		 	<!--<label class ="category">File Description (max 200)</label>-->
						
						<div class="input-group form-group-no-border text-center">
	                        <span class="input-group-addon">
	                            <i class="now-ui-icons shopping_tag-content"></i>
	                        </span>
	                        <input type="text" id="tags" name="tags" maxlength="200"  class="form-control" placeholder="Tags (Separate each tags with ENTER)">
	                   		 </div><br>
						<!--<label class="category ">Tags <small>(separate each by ENTER)</small></label>-->
						<div class="input-group form-group-no-border">
								<center><input  type="file" name="filex" id="filex"> </center>
							</div>
	 
                    </div>
                    <div class="  text-center">
                    	<input type="submit" name="submit" value="Submit" class="btn btn-neutral btn-round btn-lg">
                    </div>
                </form>
                        </div>
                    </center>


</div>>
</body>
</html>
