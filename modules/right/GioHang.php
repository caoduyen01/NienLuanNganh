<script type="text/javascript">
	function notice(){
		alert('Đăng nhập trước khi thanh toán');
	}
	function accept(id){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				alert(this.responseText);
				window.location.reload();
			}
		}
		xhttp.open("Get","xuly/thanhtoan.php?idAccount="+id,true);
		xhttp.send();
	}
	//kiem tra neu co gio hang thì gọi ajax xử lý không thì thông báo ko có giỏ hàng 

	function pay(){
		<?php 
		if(isset($_SESSION['name'])){
			include_once("xuly/connection.php");
		 	echo "var isPay = 1;";
		 	$account = connectTakeQuery("select * from account where username = '".$_SESSION['name']."' ");
		 	$idAcc = $account->fetch_assoc();
		 	echo "var id = ".$idAcc['id'].";";
		 } 
		 else {
		 	echo "var isPay = 0;";
		 }
	 ?>
		if(isPay == 1 ){
			accept(id);
		}
		else{
			notice();
		}
	}

	function add(idCart1,updateCart,ishaveAccount){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					alert(this.responseText);
					window.location.reload();
				}
			}
			xhttp.open("Get","xuly/tanggiam.php?idCart="+idCart1+"&updateCart="+updateCart+"&ishaveAccount="+ishaveAccount,true);
			xhttp.send();
		
	}

</script>
 <div class="giohang">
	<table class="table table-striped">
		<thead>
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
		</thead>
		<tbody>
			<?php
		// Kiểm tra nếu có session thì chèn vào csdl nếu không  có thì  đưa vào 1 ,ảng lưu trữ
				if (isset($_SESSION['name'])) {
					include_once("xuly/connection.php");
					$sqlGetCart = "SELECT product.id as 'idp',product.name as 'name', product.picture as 'picture',product.price as 'price',cart.amount as 'amount'FROM cart,product,account where product.id = cart.idproduct and cart.idaccount = account.id and account.username = '".$_SESSION['name']."'";
					$result = connectTakeQuery($sqlGetCart);	
					while($product = $result->fetch_assoc()){
						echo	"<tr>";	
						echo		"<td>".$product['name']."</td>";
						echo		"<td><img src='".$product['picture']."' alt='anh' class='picture'></td>";
						echo		"<td>".$product['amount']."</td>";
						echo		"<td>".$product['price']."</td>";
						echo		"<td>".$product['amount']*$product['price']."</td>";
						echo		"<td><button onclick='add(".$product['idp'].",0,true)'>+</button></td>";
						echo		"<td><button onclick='add(".$product['idp'].",1,true)'>-</button></td>";
						echo		"<td><button onclick='add(".$product['idp'].",2,true)'>X</button></td>";
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
							echo		"<td id='amount'>".$products['qty']."</td>";
							echo		"<td>".$products['price']."</td>";
							echo		"<td>".$products['qty']*$products['price']."</td>";
							echo		"<td><button onclick='add(".$products['id'].",0,false)'>+</button></td>";
							echo		"<td><button onclick='add(".$products['id'].",1,false)'>-</button></td>";
							echo		"<td><button onclick='add(".$products['id'].",2,false)'>X</button></td>";
							echo	"</tr>";
						}
					}
						
					else {
						echo	"<p>Giỏ hàng trống</p>";
						}
				}
			echo  "</tbody>";
			echo "<tr>";
			echo	"<td colspan='2'><button id = 'accept' onclick='pay()'>Thanh Toán</button></td>";
			echo "</tr>"
		?>
	
	</table>

</div> 

