<?php 
	session_start();
	include_once "../../xuly/connection.php";
	$name = trim($_POST['name']);
	$sql = "select * from account where username = '$name'";
	$count = CountRowDb($sql);
	if($count >0){
		echo "1";
	}
	else {
		echo "0";
	}
 ?>