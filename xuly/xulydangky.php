<?php 

	$name = $_POST['username'];
	$password = md5($_POST['password']);
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$level = 0;

	include_once "connection.php";
	$conn = connect();
	
	// cần xử lý 
		$sql = "insert into account(username,password,level) values"
				."('$name','$password',$level)";
	$conn->query($sql);
 	header( "Location: /ban_hang/index.php?dangky" );
	
 ?>