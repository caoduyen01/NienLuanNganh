<?php 
	session_start();
	require_once('C:\xampp\htdocs\ban_hang\xuly\connection.php');
	$con = connect();
	 $return_url   = base64_decode($_POST["return_url"]); 
	$series = $_POST['series'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$type = $_POST['type'];
	$origanal = $_POST['origanal'];
	$weight = $_POST['weight'];
	$unit = $_POST['unit'];
	$store = "C:/xampp/htdocs/ban_hang/anhsanpham/".$_FILES['picture']['name'];
	$picture ="anhsanpham/".$_FILES['picture']['name'];
	//add and get ID properties
	$sqlAddProperty = "insert into properties(xuatxu,donvi,series) values ('$origanal','$unit','$series')";
	$con->query($sqlAddProperty);
	$sqlGetIDPro = "select * from properties where series = '$series'";
	$result = $con->query($sqlGetIDPro);
	$IDPro = $result->fetch_assoc();
	//Add and get ID category
	$sqlGetIDType1 = "select * from category where name = '$type'";
	$resultID = $con->query($sqlGetIDType1);
	$count = $resultID->num_rows;
	if( $count > 0){
		$getIDType = $resultID->fetch_assoc();
	}
	else{
		$sqlAddcate = "insert into category(name) values ('$type')";
		$con->query($sqlAddcate);	
		$sqlGetIDType = "select * from category where name = '$type'";
		$result2 = $con->query($sqlGetIDType);
		$getIDType = $result2->fetch_assoc();

	}
	//nếu nhận đc lệnh add thì thêm ngược lại update thì cập nhật nhật
	if(isset($_POST['add'])){
		$sqlAddProduct = "insert into product(name, picture, picturelist, price, idcategrory,idproperties) values ('$name','$picture',1,$price,".$getIDType['id'].",".$IDPro['id'].")";
			move_uploaded_file($_FILES['picture']['tmp_name'], $store);
		$con->query($sqlAddProduct);
	}
	else if(isset($_POST['update'])){
		$sqlUpdateProduct = "UPDATE `product` SET `name`='$name',`picture`='$picture',`picturelist`=1,`price`='$price',`idcategrory`=".$getIDType['id'].",`idproperties`=".$IDPro['id'].",WHERE 1";
	}
	header('Location:'.$return_url);

 ?>