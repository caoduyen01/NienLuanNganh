<div class="content">
				<?php 
					if(isset($_GET['xem'])){
						$tam = $_GET['xem'];
					}else{
						$tam = '';
					}
					if($tam == "chitietloaisanpham"){
						include "modules/right/danhsachsp.php";
					}
					else if($tam == 'chitietsanpham'){
						include "modules/right/chitietsp.php";
					}
					else if($tam == "dangky"){
						include "modules/right/dangky.php";
					}
					else if($tam == 'giohang'){
						include "modules/right/GioHang.php";
					}
					else{
						include "modules/right/danhsachsp.php";
					}
				 ?>
			</div>
		</div>