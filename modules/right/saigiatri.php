<?php 
	// tao connection 
	include_once "../../xuly/connection.php";
	$sql = "select * from account where username = 'ajshgdhjahj'";
	$result = connectTakeQuery($sql);
	$count = $result->num_rows;
	if($count !=1){
		echo "Không tồn tại tên đăng nhập";
	}
 ?>