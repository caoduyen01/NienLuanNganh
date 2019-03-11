<div class="footer">
	<div class="poopular">
		<h3>San pham xem nhieu</h3>
		<?php 
			include_once('C:xampp/htdocs/ban_hang/xuly/connection.php');
			$result = connectTakeQuery("select * from product order by views DESC");

			for ($i=0; $i < 5 ; $i++) { 
				$row  = $result->fetch_assoc();
				echo "<div class='sanphamall'>"				
				."	<img src='".$row['picture']."'>
					<p>".$row['name']."</p>
					<p style='color: red;'>".$row['price']."VNĐ</p>
					<a href='/ban_hang/index.php?xem=chitietsanpham&id=".$row['id']."'>Chi tiết</a><br>
					<a href='xuly/xulygiohang.php?id=".$row['id']."'>Thêm vào giỏ hàng </a>
				</div>";
			}
		 ?>
	</div>
	<div class="info">
		<table>
			<tr>
				<td>Họ và tên: </td>
				<td>Phạm Nguyễn Cao Duyên</td>
			</tr>
			<tr>
				<td>MSSV: </td>
				<td>B1505871</td>
			</tr>
			<tr>
				<td>Môn học: </td>
				<td>Niên luận nghành kỹ thuật phần mềm</td>
			</tr>
		</table>
	</div>
</div>