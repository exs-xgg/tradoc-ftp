<?php
/*
DESCRIPTION: LOGIN AUTHENTICATOR
ORIGINAL PLACE: /functions/login_auth.php
AUTHOR: ROMEO MANUEL E. DAVID, EXISTENCE INNOVATIONS
DATE WRITTEN: 10/20/17
**/

if(isset($_POST['user_name']) && isset($_POST['passwd'])){

}else{
	header("location: ./badrequest.html");
}
?>