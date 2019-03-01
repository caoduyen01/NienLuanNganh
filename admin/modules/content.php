<div class="content">
	
	<?php 
		if(isset($_GET['quanly'])){
			$tam = $_GET['quanly'];
		}else{
			$tam = '';
		}
		// cho vao thang 
		if($tam == "quanlysp"){
		echo '<div class="aleft">';
				include "modules/left/hienthisp.php";
		echo '</div>';
		echo '<div class="aright">';
				include "modules/right/quanlysp.php";
		echo '</div>';
		}	
		else if($tam == 'quanlynv'){
			include "admin/modules/right/quanlynv.php";
		}
		else if($tam == 'thongtinkhach'){
		include "admin/modules/right/thongtinkhachhang.php";
		}
		else if($tam == 'doanhthu'){
			include ("admin/modules/right/doanhthu.php");
		}

 ?>

</div>