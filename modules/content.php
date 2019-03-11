<div class="content">
				<?php 
					if(isset($_GET['xem'])){
						$tam = $_GET['xem'];
					}else{
						$tam = 'gioithieu';
					}
					if($tam == "loaisanpham"){
						$loai = $_GET['loai'];
						include_once "modules/right/danhsachsp.php";
						//kiem tra loaisp neu laf 0 hien thi all. nguoc lai neu la id tim trong csdl
						// dua vao funtion lay theo loai
						if($loai == 0){
							sanpham(0,false);
						}
						else{
							include_once("xuly/connection.php");
							$getType = ConnectTakeQuery("select * from category");
							while($type = $getType->fetch_assoc() ){
								if($loai == $type['id']){
									sanpham($loai,true);
								}
							}
						}
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
					else if($tam == 'gioithieu'){
						include "modules/right/gioithieu.php";
					}

					else if($tam == 'capnhatthongtinnguoidung' ){
						include "modules/right/capnhatthongtin.php";
					}
					else{
						include "modules/right/danhsachsp.php";
					}
				 ?>
			</div>
		</div>