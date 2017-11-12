<?php
//RESTRICTED_ACCESS = restricted access.
x_log("access", .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);

header("location: ../badrequest.php?error=RESTRICTED_ACCESS");

?>


