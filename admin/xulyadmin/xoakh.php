<?php 
	require_once"C:/xampp/htdocs/ban_hang/xuly/connection.php";
	$id = $_GET['id'];
	$sql = "delete from khachhang where idaccount =$id";
	connectTakeQuery($sql);
	header("Location:/ban_hang/admin/index.php?quanly=quanlysp")
 ?>