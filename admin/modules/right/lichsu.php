<div class="total"  class="col-xs-12">
	<form action="" method="POST">
		<label for="day">Ngày</label>
		<select name="day"  class="custom-select" id="day">
			<?php 
			while ( $day<= 31) {
				echo "<option value='".$day."'>".$day."</option>";
				$day++;
			} ?>
		</select>
		<label for="month">Tháng</label>
		<select name="month"  class="custom-select" id="month">
			<?php 
			while ( $mon<= 12) {
				echo "<option value='".$mon."'>".$mon."</option>";
				$mon++;
			} 
			?>
		</select>
		<input type="text" name="year" class="form-group" placeholder="Năm">
		<input type="text" name="id" class="form-group" placeholder="ID">
		<input type="hidden" id="result" value="">
		<input type="submit" name="choose">
	</form>
	<?php 
		$day = isset($_POST['day'])?$_POST['day']:1;
		$month = isset($_POST['month'])?$_POST['month']:1;
		$year = isset($_POST['year'])?$_POST['year']:2019;
		$id = isset($_POST['id'])?$_POST['id']:0;
		$time =  $year."-".$month."-".$day;
		function ShowTotal(){
			//nếu giá trị của time bằng rỗng thì lấy hết còn không thì lấy theo giá trị đó 
			include_once("C:/xampp/htdocs/ban_hang/xuly/connection.php");
			GLOBAL $time;
			GLOBAL $id;
			$sql ="select * from logproduct where datechange <= '$time' and idproduct = $id ORDER BY datechange DESC";
			$count = CountRowDb($sql);
			if ($count >0) {
				$total = connectTakeQuery($sql);
			while($values=$total->fetch_assoc()){
					echo "<tr>";
					echo 	"<td>".$values['id']."</td>";
					echo 	"<td>".$values['nameproduct']."</td>";
					echo 	"<td>".$values['price']."</td>";
					echo 	"<td>".$values['datechange']."</td>";
					echo 	"<td>".$values['action']."</td>";
					echo 	"<td>".$values['idproduct']."</td>";
					echo "</tr>";
				}
			}
			else{

			}
		}
	 ?>
	<table class="table table-striped">
		<thead>
			<tr style="background: red;">
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Giá sản phẩm</th>
				<th>Ngày thay đổi</th>
				<th>hành động</th>
				<th>ID sản phẩm</th>
			</tr>
		</thead>
		<tbody>
			<?php
					ShowTotal();
			?>
			
		</tbody>
	</table>
</div>