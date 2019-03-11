<div class="menu">
			<ul class="control">
				<?php $url =  base64_decode($_SESSION['url']['index']); 
				echo "<li><a href='".$url."'>Trang chủ</a></li>";?>
				<li><a href="index.php?quanly=quanlysp">Quản lý sản phẩm</a></li>
				<li><a href="index.php?quanly=quanlykh">Quản lý khách hàng</a></li>
				<li><a href="index.php?quanly=thongke">Thống kê</a></li>
				
			</ul>
</div>