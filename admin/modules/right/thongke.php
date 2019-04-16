<div class="total"  class="col-xs-12">
	<form action="" method="POST" autocomplete="off">
			<label for="type" class="col-sm-1 col-form-label">Ngày</label>
			<select class="custom-select custom-select-lg col-sm-1" name="type" id="type">
				<option selected value="1">Ngày</option>
				<option selected value="2">Tháng</option>
				<option selected value="3">Năm</option>
				<option selected value="4">Tất cả</option>
			</select>



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
	</form>

	<?php 
		function ShowTotal($time,$type){
			//nếu giá trị của time bằng rỗng thì lấy hết còn không thì lấy theo giá trị đó 
			if($type == 1){
				$sqlTotal = "select * from pay where paydate = '$time'";
			}
			else if($type == 2){
				$sqlTotal = "select * from pay where month(paydate) = month('$time')";
			}
			else if($type == 3){
				$sqlTotal = "select * from pay where year(paydate) = year('$time')";
			}
			else {
				$sqlTotal = "select * from pay ";
			}
			$total = connectTakeQuery($sqlTotal);
			$count = CountRowDb($sqlTotal);
			$totalmoney = 0;
			if($count > 0){
				while($values=$total->fetch_assoc()){
					GLOBAL $totalmoney;
					echo "<tr>";
					echo 	"<td>".$values['id']."</td>";
					echo 	"<td>".$values['nameproduct']."</td>";
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
			}else{
				echo "<tr><td colspan='8'><div align='center'>Không có sản phẩm nào  được thanh toán vào thời gian này</div></td></tr>";
			}
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
			$date = getdate();
			$day = isset($_POST['day'])?$_POST['day']:1;
			$month = isset($_POST['month'])?$_POST['month']:$date['month'];
			$year = isset($_POST['year'])?$_POST['year']:$date['year'];
			$time = $year."-".$month."-".$day;

				if(isset($_POST['choose'])) {
					$type  = isset($_POST['type']) ? $_POST['type'] : 1 ;
					ShowTotal($time,$type);
				}
			?>
		</tbody>
	</table>
</div>





