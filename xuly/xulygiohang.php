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
		// kiem tra neu co san pham thi update csdl ko thì thêm mới;
		$cart = CountRowDb("select * from cart where idproduct = $sanpham ");
		$name = $_SESSION['name'];
		$account = connectTakeQuery("select * from account where username = '$name'");
		$idAccount = $account->fetch_assoc(); 
		if($cart > 0){
			$sqlUpdateCart = "update cart set amount=amount+1 where idproduct=$sanpham and idaccount =".$idAccount['id'];
		}else{
		$sqlUpdateCart = "insert into cart(idproduct,idaccount,amount,price) values($sanpham,".$idAccount['id'].",1,".$product['price'].") ";
		}
		$account = connectTakeQuery($sqlUpdateCart);
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
	$url =  isset($_SESSION['url']['index'])?base64_decode($_SESSION['url']['index']):"";
	//echo array_key_exists($sanpham, $listproduct);
	header("Location:".$url."?xem=giohang");
 ?>
