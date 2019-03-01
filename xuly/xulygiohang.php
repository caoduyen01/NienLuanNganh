<?php 
	session_start();
	include_once("connection.php");
		// Kiểm tra nếu có session thì chèn vào csdl nếu không  có thì  đưa vào 1 ,ảng lưu trữ
	$sanpham = $_GET['id'];
	$sql = "select * from product where id = $sanpham";
		$result = connectTakeQuery($sql);
		$product = $result->fetch_assoc();
		$listproduct[$sanpham] = array('id'=>$product['id'],'name'=> $product['name'],'picture'=>$product['picture'],'price'=>$product['price']);

		// neu co tai khoan them vao csdl khong thi them vao session
	if(isset($_SESSION['name'])){
		$name = $_SESSION['name'];
		$account = connectTakeQuery("select * from account where username = '$name'");
		$idAccount = $account->fetch_assoc(); 
		$sqlAddCart= "insert into cart(idproduct,idaccount,amount) values($sanpham,".$idAccount['id'].",1) ";
		$account = connectTakeQuery($sqlAddCart);
	}
	else{
		if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null ){
		$listproduct[$sanpham]['qty'] = 1;
		$_SESSION['cart'][$sanpham] = $listproduct[$sanpham];
		
		
		}
		else{
			if(array_key_exists($sanpham, $_SESSION['cart'])){
				$_SESSION['cart'][$sanpham]['qty'] += 1;

			}
			else{
				$listproduct[$sanpham]['qty'] = 1;
				$_SESSION['cart'][$sanpham] = $listproduct[$sanpham];
			}
		}
	}
	//echo array_key_exists($sanpham, $listproduct);
	echo "<pre>";
	print_r($_SESSION['cart']);
	echo "<br>";
	echo"</pre>";
	header("Location:/ban_hang/index.php?xem=giohang");

/*	
	if(isset($_SESSION['username'])){
		$name = $_SESSION['username'];	
		$sql = "select id from account where username = $name";
		$result = connectTakeQuery($sql);
		$idnguoidung = $result1->fetch_assoc();
		$id = $idnguoidung['id'];
		$query = " insert into giohang(idsanpham,soluong,idnguoidung) values($sanpham,1,$id)";
	}
	else {
		
	}

	// kiểm tra nếu có session thì truy cập csdl hiển thị lên, không thì dựa vao listproduct hiển thị thông tin  
	if(isset($_SESSION['username'])){
		$sql = "select product.name as 'tensp' from product,cart,account where product.id = cart.id";
		$result = connectTakeQuery($sql);
		echo "<div>


		</div>";
	}*/
 ?>
