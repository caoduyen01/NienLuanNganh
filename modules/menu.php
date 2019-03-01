<div class="menu">
			<ul class="login">
				
					<?php

					if(!isset($_SESSION['name'])){
						$name = '';
					}
					else {
						$name = $_SESSION['name'];
					}

					if($name == ''){
						echo "<li><a href='/ban_hang/modules/right/Dangnhap.php'>Đăng nhập </a></li>";
						echo '<li><a href="index.php?xem=dangky">Đăng ký </a></li>';
					}
					else{
						echo "<li>";
						// neu tai khoan la admin thi co chuc nang log out va quan ly 
						// khach hang thi co cap nhat thong tin va logout 
						include_once "xuly/connection.php";
						$sqlGetLevel = "select * from account  where username= '$name'";
						$result = connectTakeQuery($sqlGetLevel);
						$admin = $result->fetch_assoc();
						echo "<p>xin chào ".$name."</p>";
						if($admin['level'] == 1){
							echo "<ul class='choosemanager'>";
					 		echo "<li><a href='admin/index.php'>admin</a></li>";
					 		echo "<li><a href='xuly/xulydangxuat.php'>Đăng xuất</a></li>";
					 		echo "</ul>";

						}
						else{
							echo "<ul class='choosemanager'>";
					 		echo "<li><a href='modules/right/capnhatthongtin.php'>Thông tin người dùng</a></li>";
					 		echo "<li><a href='xuly/xulydangxuat.php'>Đăng xuất</a></li>";
					 		echo "</ul>";
						}
						echo "</li>";
					}
					
				 ?>	
			</ul>
			<ul class="control">
				<li><a href="index.php">trang chủ</a></li>
				<li><a href="index.php?xem=chitietloaisanpham&id=1">Sản phẩm</a></li>
				<li><a href="index.php">liên hệ</a></li>
				<li><a href="index.php?huongdan">Hướng dẫn </a></li>
			</ul>
</div>