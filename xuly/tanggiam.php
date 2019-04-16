<?php 
	session_start();
	include_once("connection.php");
	$id = isset($_GET['idCart'])?$_GET['idCart']:0;
	$upDown = isset($_GET['updateCart'])?$_GET['updateCart']:0;
	$ishaveAccount = isset($_GET['ishaveAccount'])?$_GET['ishaveAccount']:0;
	if($ishaveAccount == 'true'){
			if($upDown == 0){
			$sql = "update cart set amount = amount +1 where idproduct = $id ";

		}
		else if($upDown == 1){
			$sql = "update cart set amount = amount - 1 where idproduct = $id ";
		}
		else{
			$sql = "delete from cart where idproduct =$id";
		}
		$con = connect();
		$con->query($sql);
		$con->close();
	}
	else if($ishaveAccount == 'false'){
			if($upDown == 0){
				$_SESSION['cart'][$id]['qty'] += 1;
				echo "tăng gio hang thành công";
			}
			else if($upDown == 1){
				$_SESSION['cart'][$id]['qty'] -= 1;
				echo "giảm gio hang thành công";
			}
			else{
				unset($_SESSION['cart'][$id]);
				echo "Xóa gio hang thành công";
			}
	}
 ?>