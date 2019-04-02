<div class="total"  class="col-xs-12">
	<form action="" method="POST">
		<div class="Row">
			 <label for="day" class="col-sm-1 col-form-label">Ngày</label>
			<select class="custom-select custom-select-lg col-sm-1" name="day" id="day">
				<option selected value="1">1</option>
			  <?php 
			  		for ($i=2; $i <=31 ; $i++) { 
			  			echo "<option values='$i'>$i</option>";
			  		}
			   ?>
			</select>
			<label for="month" class="col-sm-1 col-form-label">Tháng:</label>
			<select class="custom-select custom-select-lg col-sm-1" name="month" id="month">
				<option selected value="1">1</option>
			  <?php 
			  		for ($i=2; $i <=12 ; $i++) { 
			  			echo "<option values='$i'>$i</option>";
			  		}
			  			
			  		
			   ?>
			</select>
			<div class="form-group row">
			    <div class="col-sm-1">
			      <input type="text" name="year" class="form-control" id="inputPassword" placeholder="<?php $date = getdate(); echo $date['year']; ?>">
			    </div>
			  </div>
			      <span><input type="submit" name="choose" class="btn btn-success" value="Xác nhận">	
		</div>      	
	</form>
	<?php 
		function ShowTotal($time){
			//nếu giá trị của time bằng rỗng thì lấy hết còn không thì lấy theo giá trị đó 
			include_once("C:/xampp/htdocs/ban_hang/xuly/connection.php");
			if($time == 0){
				$sqlTotal = "select * from pay where day(paydate) = day(now())";
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
			$totalmoney = 0;
			while($values=$total->fetch_assoc()){
				GLOBAL $totalmoney;
				echo "<tr>";
				echo 	"<td>".$values['id']."</td>";
				echo 	"<td>".$values['nameProduct']."</td>";
				echo 	"<td>".$values['idaccount']."</td>";
				echo 	"<td>".number_format($values['price'])."</td>";
				echo 	"<td>".$values['address']."</td>";
				echo 	"<td>".$values['paydate']."</td>";
				echo 	"<td>".$values['statuspay']."</td>";
				echo 	"<td>".$values['amount']."</td>";
				echo "</tr>";
				$totalmoney += ($values['amount']*$values['price']);
			}
				echo"<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Tổng tiền:". number_format($totalmoney)."</th>
						<th></th>";

		}
		
	 ?>
	<table class="table table-striped">
		<thead>
			<tr style="background: red;">
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>ID Tài khoản</th>
				<th>Giá</th>
				<th>Địa chỉ</th>
				<th>Ngày thanh toán </th>
				<th>Trạng thái</th>
				<th>Số lượng</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(isset($_POST['choose'])) {
					$time  = isset($_POST['time']) ? $_POST['time'] : 3 ;
					ShowTotal(3);
				}
			?>
		</tbody>
	</table>
</div>
