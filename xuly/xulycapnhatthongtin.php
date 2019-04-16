<?php
session_start();
	include_once "connection.php"; 
	

	if(isset($_POST['submit'])){
		$name = $_SESSION['name'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$getIDaccount = connectTakeQuery("select id from account where username = '$name' ");
		$IDaccount = $getIDaccount->fetch_assoc();
		
		// cần xử lý 
			$sql = "UPDATE `khachhang` SET fullname= '$fullname',phone='$phone',email='$email',address='$address' WHERE idaccount = ".$IDaccount['id']."";
		connect()->query($sql);
	}

	if(isset($_POST['changepass']) && isset($_SESSION['name'])){
        $passwordold = md5($_POST['passwordold']);
        $pass = md5($_POST['password']);
        $passback = $_POST['password'];
        $name = $_SESSION['name'];
        $sql = "select *  from account where username ='$name' and password ='$passwordold'";
        $count = CountRowDb($sql);
       if($count > 0){
          $sqlChangepass = "update account set passback = '$passback',password = '$pass' where username ='$name' ";
          $con = connect();
          $con->query($sqlChangepass);
          $con->close;
        }
      }
      
 		header( "Location: /ban_hang/index.php?xem=capnhatthongtinnguoidung" );
 ?>