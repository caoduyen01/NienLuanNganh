<?php 
	include_once("C:xampp/htdocs/ban_hang/xuly/connection.php");
	$con = connect();
	$url =  base64_decode($_POST["return_url"]);
	$name = $_POST['username'];
	$pass = md5($_POST['password']);
	$passback = $_POST['password'];
	$fullname = $_POST['fullname'];
	$level = $_POST['level'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	if(isset($_POST['add'])){
		$sqlAddProduct = "insert into account(username,passback,password,level) values ('$name','$passback','$pass',$level)";
		$con->query($sqlAddProduct);
		$sqlGetId = "select * from account where username = '$name' ";
		$result = connectTakeQuery($sqlGetId);
		$properties = $result->fetch_assoc();
		$sqlAddproperties = "insert into customer(fullname,phone,email,address,idaccount) values ('$fullname','$phone','$email','$address',".$properties['id'].")";
		$con->query($sqlAddproperties);
		$con->close();
	}
	else if(isset($_POST['update'])){
		$sqlUpdateProperties ="UPDATE account,customer 
							SET fullname ='$fullname', username = '$name', password = '$pass',"
							."level=$level,email = '$email',passback='$passback',phone='$phone',address='$address'"
							." WHERE username = '$name' and account.id = customer.idaccount";
		$con->query($sqlUpdateProperties);
		$con->close();
	}
	header('Location:'.$url);
 ?>