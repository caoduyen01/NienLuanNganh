<?php 
	include_once "connection.php";
	$sql = "select * from product";
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


	$product = connectTakeQuery("select * from product LIMIT $start,limit");
	while($row = $product->fetch_assoc()){
		echo "<div class="sanphamall">				
				<a href=".$id.">
					<img src=".$row['anhsp'].">
					<p>".$row['tensp']."</p>
					<p style='color: red;'>".$row['gia']."đ</p>
				</a>		
				</div>";
	}



 ?>
  <div class="page">
           <?php 
            if ($currentPage > 1 && $totalPage > 1){
                echo '<a href="index.php?page='.($currentPage-1).'">Prev</a> | ';
            }
            for ($i = 1; $i <= $totalPage; $i++){
                if ($i == $currentPage){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($currentPage < $totalPage && $totalPage > 1){
                echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>