<?php
session_start(); 
	$name = $_SESSION['name'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	include_once "connection.php";
	$getIDaccount = connectTakeQuery("select id from account where username = '$name' ");
	$IDaccount = $getIDaccount->fetch_assoc();
	
	// cần xử lý 
		$sql = "UPDATE `khachhang` SET fullname= '$fullname',phone='$phone',email='$email',address='$address' WHERE idaccount = ".$IDaccount['id']."";
	connect()->query($sql);
 	header( "Location: /ban_hang/index.php?capnhatthongtin" );
 ?>