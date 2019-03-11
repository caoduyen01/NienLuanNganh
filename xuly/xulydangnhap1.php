<?php 
	$name = $_POST["username"];
	$password = md5($_POST["password"]);
	// tao connection 
	include_once "connection.php";
	$rq = $_REQUEST["rq"];
	$sql = "select * from account where username = '$rq'";
	$result = connectTakeQuery($sql);
	$count = $result->num_rows;
	echo $count;
	if($count >=1){
		echo "<p>Không tồn tại tên đăng nhập</p>";
	}
?>	