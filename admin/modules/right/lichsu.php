<div class="total"  class="col-xs-12">
	<form action="" method="POST" autocomplete="off">
		<label for="day">Ngày</label>
		<select name="day"  class="custom-select" id="day">
			<option selected value="1">1</option>
			  <?php 
			  		for ($i=2; $i <=31 ; $i++) { 
			  			echo "<option values='$i'>$i</option>";
			  		}
			   ?>
		</select>
		<label for="month">Tháng</label>
		<select name="month"  class="custom-select" id="month">
			<option selected value="1">1</option>
			  <?php 
			  		for ($i=2; $i <=12 ; $i++) { 
			  			echo "<option values='$i'>$i</option>";
			  		}
			  			
			  		
			   ?>
		</select>
		<label for="year">Năm</label>
		<input type="text" id="year" name="year" class="form-group" placeholder="<?php $date = getdate(); echo $date['year']; ?>">
		<label for="idproduct">ID sản phẩm</label>
		<input type="text" id="idproduct" name="id" class="form-group" placeholder="ID">
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
			GLOBAL $time;
			GLOBAL $id;
			$sql ="select * from logproduct where datechange <= '$time' and idproduct = $id ORDER BY datechange DESC";			
			try{  

				$count = CountRowDb($sql);
				}catch(Exception $e){
				    echo 'failed';
				}
			if ( $count == 0) {
				echo "<tr><td>Không có sản phẩm</td></tr>";
				return null;
			}
			else{

					
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
							$con = include_once("C:/xampp/htdocs/ban_hang/xuly/connection.php"); 
					ShowTotal();
			?>
			
		</tbody>
	</table>
</div>