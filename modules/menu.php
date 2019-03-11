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
					 		echo "<li><a href='/ban_hang/index.php?xem=capnhatthongtinnguoidung'>Thông tin người dùng</a></li>";
					 		echo "<li><a href='xuly/xulydangxuat.php'>Đăng xuất</a></li>";
					 		echo "</ul>";
						}
						echo "</li>";
					}
					
				 ?>	
			</ul>
			<ul class="control">
				<li><a href="index.php">Trang chủ</a></li>
				<li><a href="index.php?xem=loaisanpham&loai=0">Sản phẩm</a>
					<ul class="choosemanager">
						
						<?php  
							include_once "xuly/connection.php";
							$result = connectTakeQuery("select * from category");
							while($type = $result->fetch_assoc()){
								echo "<li><a href='index.php?xem=loaisanpham&loai=".$type['id']."'>".$type['name']."</a></li>";
							}
						 ?>
					</ul>
				</li>
				<li><a href="index.php?xem=thongtincongty">Liên hệ</a></li>
				<li><a href="index.php?xem=gioithieu">Giới thiệu</a></li>
				<li id="giohang"><a href="index.php?xem=giohang"><img src="anhnen/icon/giohang.png"></a></li>
			</ul>
			
</div>