<?php 
	require_once"C:/xampp/htdocs/ban_hang/xuly/connection.php";
	$id = $_GET['id'];
	$sqlDeleteCart = "delete from cart where idaccount =$id";
	$sql = "delete from customer where idaccount =$id";
	$sqlDeleteAccount = "delete from account where id =$id";
	connectTakeQuery($sqlDeleteCart);
	connectTakeQuery($sql);
	connectTakeQuery($sqlDeleteAccount);
	header("Location:/ban_hang/admin/index.php?quanly=quanlysp")
 ?>