<?php 
	$sql = "select * from product";
	$result = connectTakeQuery($sql);
	$css = $result->fetch_assoc();

	echo $css['price'];
 ?>