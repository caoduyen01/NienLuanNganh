<?php 
	session_start();

	$name = $_POST["username"];
	$password = md5($_POST["password"]);
	// tao connection 
	include_once "connection.php";

	$sql = "select * from account where username = '$name' and password = '$password'";
	$result = connectTakeQuery($sql);
	$count = $result->num_rows;
	echo $count;
	if($count >=1){
		header("location: /ban_hang/index.php");
		$_SESSION["name"]  = $name;
	}else{
		header("location: /ban_hang/modules/right/Dangnhap.php");
	}

 ?>