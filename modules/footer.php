<div class="footer">
	<div class="popular">
		<h3 id='po'>Gợi ý sản phẩm</h3>
		<?php 
			include_once('C:xampp/htdocs/ban_hang/xuly/connection.php');
			$result = connectTakeQuery("select * from product order by views DESC");

			for ($i=0; $i < 5 ; $i++) { 
				$row  = $result->fetch_assoc();
				echo "<div class='sanphamall'>"				
				."	<img src='".$row['picture']."'>
					<a href='/ban_hang/index.php?xem=chitietsanpham&id=".$row['id']."'><p>".$row['name']."</p></a>
					<p style='color: red;'>".number_format($row['price'])."VNĐ</p>
					
					<a href='xuly/xulygiohang.php?id=".$row['id']."' id='addtocart'>Thêm vào giỏ hàng </a>
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
