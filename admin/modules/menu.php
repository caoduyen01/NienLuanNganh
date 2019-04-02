<div class="menu">
			<ul class="control">
				<?php $url =  isset($_SESSION['url']['index'])?base64_decode($_SESSION['url']['index']):""; 
				echo "<li><a href='".$url."'>Trang chủ</a></li>";?>
				<li><a href="index.php?quanly=quanlysp">Quản lý sản phẩm</a></li>
				<li><a href="index.php?quanly=quanlykh">Quản lý khách hàng</a></li>
				<li><a href="index.php?quanly=thongke">Thống kê</a>
				<li><a href="index.php?quanly=lichsu">Lịch sử giá sản phẩm</a></li>
				
			</ul>
</div>