<?php 
	include_once ("xuly/connection.php");
	$id = $_GET['id'];
	$sql = "select  product.name as 'name', product.picture as 'picture',product.price as 'price', properties.xuatxu as'origanal', properties.khoiluong as 'weight', properties.donvi as 'unit',product.views as 'views' from product,properties where properties.id = product.idproperties and product.id = $id";
	$result = connectTakeQuery($sql);
	$row = $result->fetch_assoc();
	$views = $row['views']+1; 
	$sqlUpdateViews = "update product set views = ".$views."where id = $id";
	connectTakeQuery($sqlUpdateViews);
 ?>
<div class="chitietsanpham">
	<?php echo "<img src='".$row['picture']."' />";?>
	<table>
		<tr>
			<td>Tên sản phẩm: </td>
			<td> <?php echo $row['name']; ?></td>
		</tr>
		<tr>
			<td>Xuất xứ : </td>
			<td> <?php echo $row['origanal'];?></td>
		</tr>
		<tr>
			<td>Đơn vị: </td>
			<td> <?php echo $row['unit'];?> </td>
		</tr>
		<tr>
			<td>Khối lượng/đơn vị: </td>
			<td><?php echo $row['weight'];?></td>
		</tr>

	</table>
</div>

