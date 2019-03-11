
 <?php 
		include_once "xuly/connection.php";
function sanpham($idcate,$isHave){
	if ($isHave == false) {
		$sql = "select * from product";
	}
	else{
		$sql = "select * from product,category where product.idcategrory =category.id AND category.id=$idcate";
	}
	
	$result = connectTakeQuery($sql);
	$count = $result->num_rows;
	//trang  hien tai
	$currentPage = isset($_GET['page'])? $_GET['page'] :1;
	$limit = 20;
	$totalPage = ceil($count/$limit);
	if($currentPage >= $totalPage){
		$currentPage = $totalPage;
	}
	else if($currentPage <1){
		$currentPage = 1;
	}
	$start = ($currentPage - 1) * $limit;
	if($isHave == false){
		$product = connectTakeQuery("select * from product LIMIT $start,$limit ");
	}
	else{
	$product = connectTakeQuery("select product.id as 'id',product.picture as 'picture',product.name as 'name',product.price as 'price' from product,category where product.idcategrory = category.id AND category.id=$idcate LIMIT $start,$limit");
	}
	while($row = $product->fetch_assoc()){
		echo "<div class='sanphamall'>"				
				."	<img src='".$row['picture']."'>
					<p>".$row['name']."</p>
					<p style='color: red;'>".$row['price']."đ</p>
					<a href='/ban_hang/index.php?xem=chitietsanpham&id=".$row['id']."'>Chi tiết</a><br>
					<a href='xuly/xulygiohang.php?id=".$row['id']."'>Thêm vào giỏ hàng </a>
				</div>";
	}
echo '<div class="page">';
          
            if ($currentPage > 1 && $totalPage > 1){
                echo '<a href="index.php?page='.($currentPage-1).'">Prev</a>';
            }
            for ($i = 1; $i <= $totalPage; $i++){
                if ($i == $currentPage){
                    echo '<span class="currentNumber">'.$i.'</span>';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> ';
                }
            }
            if ($currentPage < $totalPage && $totalPage > 1){
                echo '<a href="index.php?page='.($currentPage+1).'">Next</a> ';
            }
        
echo "</div>";
}   

?>