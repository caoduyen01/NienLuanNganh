
	<div class="header">

			<ul class="login">
				
					<?php
					echo '<li id="giohang"><i><a href="index.php?xem=giohang"  ><img src="anhnen/icon/giohang.png" ></a></i></li>';

					if(!isset($_SESSION['name'])){
						$name = '';
					}
					else {
						$name = $_SESSION['name'];
					}

					if($name == ''){
						echo "<li><a href='/ban_hang/modules/right/Dangnhap.php'>Đăng nhập </a></li>";
						echo "<li><a href='index.php?xem=dangky'>Đăng ký </a></li>";
					}
					else{
						echo "<li>";
						// neu tai khoan la admin thi co chuc nang log out va quan ly 
						// khach hang thi co cap nhat thong tin va logout 
						include_once "xuly/connection.php";
						$sqlGetLevel = "select * from account  where username= '$name'";
						$result = connectTakeQuery($sqlGetLevel);
						$admin = $result->fetch_assoc();
						echo "<p id='loginname' >xin chào ".$name."</p>";
						if($admin['level'] == 1){
							echo "<ul class='choosemanager'>";
					 		echo "<li><a href='admin/index.php'>admin</a></li>";
					 		echo "<li><a href='xuly/xulydangxuat.php'>Đăng xuất</a></li>";
					 		echo "</ul>";

						}
						else{
							echo "<ul class='choosemanager'>";
					 		echo "<li><a href='/ban_hang/index.php?xem=capnhatthongtinnguoidung'>Thông tin người dùng</a></li>";
					 		echo "<li><a href='xuly/xulydangxuat.php'>Đăng xuất</a></li>";
					 		echo "</ul>";
						}
						echo "</li>";
					}
				 ?>	
			</ul>
			<img src="anhnen/iconWeb.png" alt="anhnen" id="logo">
			<div class="logan">
				<h1> TN Shop</h1>
				<p>Mang Ẩm thực An Giang đến với bạn!</p>
				<p>  &nbsp;</p>
			</div>
			<form action="modules/right/hienthisp.php" method="POST">
				<tr>
					<td><input type="index" name="search" placeholder="Tìm kiếm" id="search"></td>
					<td><input type="submit" name="submit" value="Tìm"></button></td>
				</tr>
			</form>

	</div>