<?php 
	/* Thanh toan xxuwr lý bằng cách thêm giỏ hàng vào bảng thanh toán rồi xóa bỏ giỏ hàng để lần sau còn thêm tiếp. giữ giá trị của giỏ hàng người dùng để sau này thống kê.
	*/
	include_once("C:xampp/htdocs/ban_hang/xuly/connection.php");
	$id = $_REQUEST['idcart'];
	$sqlAddress = " SELECT khachhang.address as 'address', cart.idproduct as 'idproduct', cart.idaccount			 as 'idaccount', cart.amount as 'amount' "
				  ." FROM cart,account,khachhang" 
				  ." WHERE cart.idaccount= account.id and account.id = khachhang.idaccount and account.id = $id";
	$getInfo = connectTakeQuery($sqlAddress);
	$count = $getInfo->num_rows;
	if($count > 0){
		$con = connect();
		while($values = $getInfo->fetch_assoc()){
			
			$sqlAdd = "INSERT INTO `pay`(`idproduct`, `idaccount`, `statuspay`, `paydate`, `address`, `amount`			)"
					  ." VALUES (".$values['idproduct'].",".$values['idaccount'].",1,CURTIME(),'".$values['address']."',".$values['amount'].")";
			$con->query($sqlAdd);
			$sqlDelete = "DELETE FROM cart where idaccount = $id";
			$con->query($sqlDelete);
		}
		echo "Bạn đã thanh toán thành công";
		$con->close();
	}
	else{
		echo "Giỏ hàng của bạn trống";
	}
	
	
 ?>