<?php
	// co the thu cach dung globle de toi uu hoa 
	function connect(){
	$conn = new mysqli("localhost","root","","banhangdemo");
	return $conn;
	}
	function connectTakeQuery($sql){
	$conn = new mysqli("localhost","root","","banhangdemo");
	$result = $conn->query($sql);
	return $result;
	}
	function CountRowDb($sql){
	$conn = new mysqli("localhost","root","","banhangdemo");
	$result = $conn->query($sql);
	$count = $result->num_rows;
	return $count;
	}

?>