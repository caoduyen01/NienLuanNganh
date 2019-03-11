<div class="total">
	<form action="" method="POST">
		<select name="time">
			<option value="0">Ngày</option>
			<option value="1">Tháng</option>
			<option value="2">Năm</option>
			<option value="3">Tất cả</option>
		</select>
		<input type="submit" name="choose">
	</form>
	<?php 
		function ShowTotal($time){
			//nếu giá trị của time bằng rỗng thì lấy hết còn không thì lấy theo giá trị đó 
			include_once("C:/xampp/htdocs/ban_hang/xuly/connection.php");
			if($time == 0){
				$sqlTotal = "select * from pay where day(paydate) = now()";
			}
			else if($time == 1){
				$sqlTotal = "select * from pay where month(paydate) = month(now())";
			}
			else if($time == 2){
				$sqlTotal = "select * from pay where year(paydate) = year(now())";
			}
			else {
				$sqlTotal = "select * from pay ";
			}

			$total = connectTakeQuery($sqlTotal);
			while($values=$total->fetch_assoc()){
				echo "<tr>";
				echo 	"<td>".$values['id']."</td>";
				echo 	"<td>".$values['idproduct']."</td>";
				echo 	"<td>".$values['idaccount']."</td>";
				echo 	"<td>".$values['address']."</td>";
				echo 	"<td>".$values['paydate']."</td>";
				echo 	"<td>".$values['statuspay']."</td>";
				echo 	"<td>".$values['amount']."</td>";
				echo "</tr>";
			}

		}
		
	 ?>
	<table>
		<tr>
			<th>ID</th>
			<th>Tên sản phẩm</th>
			<th>Tên tài khoản</th>
			<th>Địa chỉ giao hàng</th>
			<th>Ngày thanh toán</th>
			<th>Trạng thái </th>
			<th>Số Lượng</th>
		</tr>
		<?php
			if(isset($_POST['choose'])) {
				$time  = isset($_POST['time']) ? $_POST['time'] : 3 ;
				ShowTotal($time);
			}
		?>
	</table>
</div>