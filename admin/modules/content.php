<div class="content">
	
	<?php 
		if(isset($_GET['quanly'])){
			$tam = $_GET['quanly'];
		}else{
			$tam = '';
		}
		// cho vao thang 
		if($tam == "quanlysp"){
		echo '<div class="aright">';
				include "modules/right/quanlysp.php";
		echo '</div>';
		echo '<div class="aleft">';
				include "modules/left/hienthisp.php";
		echo '</div>';
		
		}	
		else if($tam == 'quanlykh'){
			echo '<div class="aright">';
					include "modules/right/quanlythongtin.php";
			echo '</div>';
			echo '<div class="aleft">';
				include "modules/left/danhsachkhachhang.php";
			echo '</div>';
		}
		else if($tam == 'thongke'){
				include "modules/right/thongke.php";
			}
		else if($tam == 'lichsu'){
				include "modules/right/lichsu.php";
			}

 ?>

</div>