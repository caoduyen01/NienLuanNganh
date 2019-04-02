<?php 
	// tao connection 
	include_once "../../xuly/connection.php";
	$name = $_POST['name'];
	$pass = md5($_POST['pass']);
	$sql = "select * from account where username = '$name' and password ='$pass' ";
	$count = CountRowDb($sql);
	if($count >0){
		echo "Đăng nhập thành công";
	}
	else {
		echo "Sai tài khoản hoặc mật khẩu";
	}
 ?>