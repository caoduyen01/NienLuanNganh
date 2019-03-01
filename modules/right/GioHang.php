 <div class="giohang">
	<table>
		<tr>
			<th>Tên sản phẩm</th>
			<th>Hình ảnh</th>
			<th>Số lượng</th>
			<th>Giá</th>
			<th>Tổng giá</th>
			<th>Thêm</th>
			<th>Giảm</th>
			<th>Xóa</th>
		</tr>
		
			<?php
		// Kiểm tra nếu có session thì chèn vào csdl nếu không  có thì  đưa vào 1 ,ảng lưu trữ
				if (isset($_SESSION['name'])) {
					include_once("xuly/connection.php");
					$sqlGetCart = "SELECT product.name as 'name', product.picture as 'picture',product.price as 'price',cart.amount as 'amount' 	 FROM cart,product,account where product.id = cart.idproduct and cart.idaccount = account.id and account.username = '".$_SESSION['name']."'";
					$result = connectTakeQuery($sqlGetCart);
					while($product = $result->fetch_assoc()){
						echo	"<tr>";	
						echo		"<td>".$product['name']."</td>";
						echo		"<td><img src='".$product['picture']."' alt='anh' class='picture'></td>";
						echo		"<td>".$product['amount']."</td>";
						echo		"<td>".$product['price']."</td>";
						echo		"<td>".$product['amount']*$product['price']."</td>";
						echo		"<td>+</td>";
						echo		"<td>-</td>";
						echo		"<td>X</td>";
						echo	"</tr>";
					}
				}
				else{
					// kiemtra neu co gio hang thi in ra không thì giỏ hàng trống
					if (isset($_SESSION['cart'])) {
						foreach ($_SESSION['cart'] as $products) {
							echo	"<tr>";	
							echo		"<td>".$products['name']."</td>";
							echo		"<td><img src='".$products['picture']."' alt='anh'></td>";
							echo		"<td>".$products['qty']."</td>";
							echo		"<td>".$products['price']."</td>";
							echo		"<td>".$products['qty']*$products['price']."</td>";
							echo		"<td>+</td>";
							echo		"<td>-</td>";
							echo		"<td>X</td>";
							echo	"</tr>";
						}
					}

					else {
						echo	"<p>Giỏ hàng trống</p>";
					}
				}
			?>
		
	</table>
</div> 

