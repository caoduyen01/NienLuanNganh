<?php 

	$name = $_POST['username'];
	$password = md5($_POST['password']);
	$passback = $_POST['password'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$level = 0;

	include_once "connection.php";
	$conn = connect();
	
	// cần xử lý 
	$sql = "insert into account(username,password,level,passback) values"
			."('$name','$password',$level,'$passback')";
	$conn->query($sql);

	$sqlGetIDAccount = "select id from account where username = '$name'";
	$account = connectTakeQuery($sqlGetIDAccount);
	$IdAccount = $account->fetch_assoc();
	$sqlAddKH = "insert into customer(fullname,phone,email,address,idaccount) values"
			."('$fullname','$phone','$email','$address',".$IdAccount['id'].")";
	$conn->query($sqlAddKH);
	$conn->close();
 	header( "Location: /ban_hang/index.php?xem=dangky" );
	
 ?>