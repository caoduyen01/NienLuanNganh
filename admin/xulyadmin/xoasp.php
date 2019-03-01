<?php 
	require_once"C:/xampp/htdocs/ban_hang/xuly/connection.php";
	$id = $_GET['id'];
	$sql = "delete from product where id =$id";
	connectTakeQuery($sql);
	header("Location:/ban_hang/admin/index.php?quanly=quanlysp")
 ?>