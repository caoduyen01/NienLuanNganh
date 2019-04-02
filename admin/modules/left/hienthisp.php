
	<?php 
		require_once "C:/xampp/htdocs/ban_hang/xuly/connection.php";
		$sql = "SELECT product.id as 'id' ,properties.series as 'ma',product.name as 'ten',product.price as 'gia',category.name as 'loai',properties.xuatxu as 'xuatxu',properties.khoiluong as 'khoiluong',properties.donvi as 'donvi' FROM product,properties,category where product.idcategrory = category.id and product.idproperties = properties.id ";
		$result = connectTakeQuery($sql);
	 ?>
		<div class="col-xs-11">
            <table class="table table-striped">
                <thead>
                    <tr>
                    	<th>Mã</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Xuất xứ</th>
                        <th>Khối Lượng</th>
                        <th>Đơn vị</th>
                        <th colspan="2">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					while($product = $result->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $product['ma'];?></td>
				<td><?php echo $product['ten'];?></td>
				<td><?php echo $product['gia'];?></td>
				<td><?php echo $product['xuatxu'];?></td>
				<td><?php echo $product['khoiluong'];?></td>
				<td><?php echo $product['donvi'];?></td>
				<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $product['id'];?>">Cập nhật</button></td>	
				<td><a href="xulyadmin/xoasp.php?id=<?php echo $product['id'];?>"/><button class="btn btn-danger">Xóa</button></a></td>	
			</tr>
			</tbody>

  <!-- Modal -->
  				<div class="modal fade" id="myModal<?php echo $product['id'];?>" role="dialog">
  				  <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Cập nhật thông tin sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form action="xulyadmin/xulysp.php" method="POST" enctype="multipart/form-data">
                        <?php $current_url = base64_encode($_SERVER['REQUEST_URI']);?>
                        <input type="hidden" name="return_url" value="<?php echo $current_url;?>" />
                          <div class="form-group">
                        <label for="seriesProduct">Mã sản phẩm</label>
                        <input type="text" class="form-control" id="series" name="series" value="<?php  echo $product['ma']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="nameProduct">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="nameProduct" value="<?php echo $product['ten']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="picturePd">Hình Ảnh sản phẩm</label>
                        <input type="file" class="form-control-file" name='picture' id="picturePd">
                      </div>
                      <div class="form-group">
                        <label for="priceProduct">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="price" id="priceProduct" value="<?php echo $product['gia'];?>">	
                      </div>
                      <div class="form-group">
                        <label for="typeProduct">Loại sản phẩm</label>
                        <input type="text" class="form-control" name="type" id="typeProduct" value="<?php  echo $product['loai'];?>">
                      </div>
                      <div class="form-group">
                        <label for="origanalProduct">Xuất xứ</label>
                        <input type="text" class="form-control" name="origanal" id="origanalProduct" value="<?php  echo $product['xuatxu'];?>">
                      </div>
                      <div class="form-group">
                        <label for="weightProduct">Khối lượng</label>
                        <input type="text" class="form-control" name="weight" id="weightProduct" value="<?php  echo $product['khoiluong'];?>">
                      </div>
                      <div class="form-group">
                        <label for="unitProduct">Đơn vị</label>
                        <select name="unit" class="form-control" id="unitProduct">
                          <option value="Kg">Kg</option>
                          <option value="Hộp">Hộp</option>
                        </select>
                      </div>  
                      <div class="form-group" align="center">
                        <input type="submit" name="update" value="cập nhật" class="btn btn-info">
                      </div>
                    </form>
               </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
              </div>
              
            </div>
          </div>
		<?php } ?>
		 <tr>
		 	<td></td>
		 	<td></td>
		 	<td></td>
		 	<td></td>
		 	<td></td>
		 	<td></td>
		 	<td colspan="2"></td>
		 </tr>
	</table>
</div>