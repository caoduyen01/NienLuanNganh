<div class="menu">
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
			</ul>
			
</div>