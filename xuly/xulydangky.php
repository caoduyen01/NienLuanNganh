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

	$sqlGetIDAccount = "select id from account where username = '$name'";
	$account = connectTakeQuery($sqlGetIDAccount);
	$IdAccount = $account->fetch_assoc();
	$sqlAddKH = "insert into khachhang(fullname,phone,email,address,idaccount) values"
			."('$fullname','$phone','$email','$address',".$IdAccount['id'].")";
	$conn->query($sqlAddKH);
	$conn->close();
 	header( "Location: /ban_hang/index.php?xem=dangky" );
	
 ?>