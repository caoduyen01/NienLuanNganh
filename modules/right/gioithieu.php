<div class="intro">
	<div class="leftintro">
		<ul>
			<?php 	
				include_once('xuly/connection.php');
				$type = connectTakeQuery("select * from category");
				while($typepro = $type->fetch_assoc()){
					echo "<li><a href='/ban_hang/index.php?xem=loaisanpham&loai=".$typepro['id']."'>".$typepro['name']."</a></li>";
				}
			 ?>
		</ul>	
	</div>
	<div class="rightintro">
		<div id="anhdichuyen" class="carousel slide col-lg-12" data-ride="carousel">
    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#anhdichuyen" data-slide-to="0" class="active"></li>
	      <li data-target="#anhdichuyen" data-slide-to="1"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">

	      <div class="item active">
	        <img src="anhnen/advWeb/anhnenweb.png" alt="Los Angeles" style="width:100%;height:300px;">
	      </div>

	      <div class="item">
	        <img src="anhnen/advWeb/anhkhuyenmai.jpg" alt="Chicago" style="width:100%;height:300px;">
	      </div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#anhdichuyen" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#anhdichuyen" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>

	<div class="introproduct">
		<?php 
			include_once('C:xampp/htdocs/ban_hang/xuly/connection.php');
			$result = connectTakeQuery("select * from product");

			for ($i=0; $i < 10 ; $i++) { 
				$row  = $result->fetch_assoc();
				echo "<div class='sanphamall'>"				
				."	<img src='".$row['picture']."'>
					<a href='/ban_hang/index.php?xem=chitietsanpham&id=".$row['id']."'><p>".$row['name']."</p></a>
					<p style='color: red;'>".number_format($row['price'])."VNĐ</p>
					
					<a href='xuly/xulygiohang.php?id=".$row['id']."' id='addtocart'>Thêm vào giỏ hàng </a>
				</div>";
			}
		 ?>
	</div>
</div>