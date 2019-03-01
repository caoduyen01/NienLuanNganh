<div class="left">
				<div class="danhsachsanpham">
					<table>
						<tr>
							<th>Tên sản phẩm </th>
							<th>Hình ảnh</th>
							<th>Giá sản phẩm </th>
						</tr>
						<?php 
							require_once("C:/xampp/htdocs/ban_hang/xuly/connection.php");
							$sql= "select * from product";
							$result = connectTakeQuery($sql);
							while($product =  $result->fetch_assoc()){
								echo "<tr>";
								echo "<td>".$product['name']."</td>";
								echo "<td>".$product['picture']."</td>";
								echo "<td>".$product['price']."</td>";
								echo "</tr>"
							}
						 ?>
					</table>
				</div>
			</div>