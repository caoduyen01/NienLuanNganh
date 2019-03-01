
	<?php 
		require_once "C:/xampp/htdocs/ban_hang/xuly/connection.php";
		$sql = "SELECT product.id as 'id' ,properties.series as 'ma',product.name as 'ten',product.price as 'gia',properties.xuatxu as 'xuatxu',properties.khoiluong as 'khoiluong',properties.donvi as 'donvi' FROM product,properties,category where product.idcategrory = category.id and product.idproperties = properties.id ";
		$result = connectTakeQuery($sql);
	 ?>
<table>
	<tr class="row-title-product">
		<th>Mã</th>
		<th>Tên</th>
		<th>Giá</th>
		<th>Xuất xứ</th>
		<th>Khối lượng</th>
		<th colspan="2">Đơn vị</th>
	</tr>

	<?php 
		while($product = $result->fetch_assoc()){
			echo "<tr>";
			echo 	"<td><span> ".$product['ma']."</span></td>";
			echo 	"<td><span class='nameproduct'>".$product['ten']."</span></td>";
			echo 	"<td><span class='priceproduct'>".$product['gia']."</span></td>";
			echo 	"<td><span class='origanalproduct'>".$product['xuatxu']."</span></td>";
			echo 	"<td><span class='weightproduct'>".$product['khoiluong']."</span></td>";
			echo 	"<td><span class='unitproduct'>".$product['donvi']."</span></td>";
			echo 	"<td><span class='deletepproduct'><a href='xulyadmin/xoasp.php?id=".$product['id']."'/>Xóa</a></span></td>";
			echo "</tr>";
	}
	 ?>
	 <tr>
	 	<td></td>
	 	<td></td>
	 	<td></td>
	 	<td></td>
	 	<td></td>
	 	<td colspan="2"></td>

	 </tr>
</table>