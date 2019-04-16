<?php 
	
	include_once "../../xuly/connection.php";
	$series = $_GET['series'];
	$sql = "select * from properties where series = '$series'";
	$count = CountRowDb($sql);
	echo $count;
 ?>