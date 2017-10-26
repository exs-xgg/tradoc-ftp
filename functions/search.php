<?php

if (isset($_SESSION['user'])) {
	
}else {
	header("location: ../badrequest.php?error=RESTRICTED_ACCESS");
}

?>