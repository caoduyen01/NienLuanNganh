<?php 
	include_once ("xuly/connection.php");
	$id = $_GET['id'];
	$sql = "select  product.name as 'name', product.picture as 'picture',product.price as 'price', properties.xuatxu as'origanal', properties.khoiluong as 'weight', properties.donvi as 'unit',product.views as 'views' from product,properties where properties.id = product.idproperties and product.id = $id";
	$result = connectTakeQuery($sql);
	$row = $result->fetch_assoc();
	$sqlUpdateViews = "update product set views = views+1 where id = $id";
	$con = connect();
	$con->query($sqlUpdateViews);
 ?>
<div class="chitietsanpham">
	<?php echo "<img src='".$row['picture']."' />";?>
	<table>
		<tr>
			<th>Tên sản phẩm: </th>
			<td> <?php echo $row['name']; ?></td>
		</tr>
		<tr>
			<th>Xuất xứ : </th>
			<td> <?php echo $row['origanal'];?></td>
		</tr>
		<tr>
			<th>Đơn vị: </th>
			<td> <?php echo $row['unit'];?> </td>
		</tr>
		<tr>
			<th>Khối lượng/đơn vị: </th>
			<td><?php echo $row['weight'];?></td>
		</tr>

	</table>
</div>

