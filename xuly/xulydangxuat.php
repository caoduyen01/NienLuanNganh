<?php 
	session_start();
	session_destroy();
	header('location: /ban_hang/index.php');
 ?>