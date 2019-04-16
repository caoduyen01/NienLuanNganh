<?php
	if(!isset($_SESSION['url']['connect']))
		$_SESSION['url']['connect'] = base64_encode($_SERVER['REQUEST_URI']);
	// co the thu cach dung globle de toi uu hoa 
	function connect(){
	$conn = new mysqli("localhost","root","","banhang");
	return $conn;
	}
	function connectTakeQuery($sql){
	$conn = new mysqli("localhost","root","","banhang");
	$result = $conn->query($sql);
	return $result;
	}
	function CountRowDb($sql){
	$conn = new mysqli("localhost","root","","banhang");
	$result = $conn->query($sql);
	$count = $result->num_rows;
	return $count;
	}
	

?>