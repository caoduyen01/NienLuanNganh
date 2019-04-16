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
	//nếu nhận đc lệnh add thì thêm ngược lại update thì cập nhật nhật
	if(isset($_POST['add'])){
		$store = "C:/xampp/htdocs/ban_hang/anhsanpham/".$_FILES['picture']['name'];
		$picture ="anhsanpham/".$_FILES['picture']['name'];
	//add and get ID properties
		$sqlAddProperty = "insert into properties(xuatxu,donvi,series,khoiluong) values ('$origanal','$unit','$series',$weight)";
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
	$sqlAddProduct = "insert into product(name, picture,price,idcategrory,idproperties) values ('$name','$picture',$price,".$getIDType['id'].",".$IDPro['id'].")";
			move_uploaded_file($_FILES['picture']['tmp_name'], $store);
		$con->query($sqlAddProduct);
		$con->close();
	}
	else if(isset($_POST['update'])){
		//add and get ID properties
		$sqlGetIDPro = "select * from properties where series = '$series'";
		$Props = $con->query($sqlGetIDPro);
		$IDPro = $Props->fetch_assoc();
		//get ID type có sẵn nên ko cần phải xem xét có trong csdl hay ko 
		$sqlGetIDType1 = "select * from category where name = '$type'";
		$resultID = $con->query($sqlGetIDType1);
		$getIDType = $resultID->fetch_assoc();
		if($_FILES['picture']['name'] != ''){
			$store = "C:/xampp/htdocs/ban_hang/anhsanpham/".$_FILES['picture']['name'];
			$picture ="anhsanpham/".$_FILES['picture']['name'];
			$sqlUpdateProduct = "UPDATE product,properties,category SET product.name='$name',`picture`='$picture',properties.xuatxu = '$origanal',`price`=$price,`idcategrory`=".$getIDType['id'].",`idproperties`=".$IDPro['id'].",properties.khoiluong= $weight where properties.series = '$series' and properties.id = product.idproperties AND category.id = product.idcategrory";
			move_uploaded_file($_FILES['picture']['tmp_name'], $store);
			echo $_FILES['picture']['name'];
		}else{
			$sqlUpdateProduct = "UPDATE product,properties,category SET product.name='$name',properties.xuatxu = '$origanal',`price`=$price,`idcategrory`=".$getIDType['id'].",`idproperties`=".$IDPro['id'].",properties.khoiluong= $weight where properties.series = '$series' and properties.id = product.idproperties AND category.id = product.idcategrory";
			echo " thành công 2";
		}
		$con->query($sqlUpdateProduct);
		$con->close();
	}
	
		//header('Location:/ban_hang/admin/index.php?quanly=quanlysp');

 ?>
