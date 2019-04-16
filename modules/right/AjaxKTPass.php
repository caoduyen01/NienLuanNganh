<?php 
	session_start();
	include_once "../../xuly/connection.php";
	$name = $_SESSION['name'];
	$pass = md5($_POST['pass']);
	$sql = "select * from account where username = '$name' and password ='$pass' ";
	$count = CountRowDb($sql);
	if($count >0){
		echo "có mật khẩu";
	}
	else {
		echo "sai mật khẩu";
	}
 ?>