<?php 
		require_once "C:/xampp/htdocs/ban_hang/xuly/connection.php";
		$sql = "SELECT account.id as 'id',account.username as 'username' ,account.passback as 'passback',"
			  ."account.level as 'level',khachhang.fullname as 'fullname',"
			  ."khachhang.phone as 'phone',khachhang.email as 'email',khachhang.address as 'address'"
			  ." FROM account,khachhang where account.id = khachhang.idaccount ";
		$result = connectTakeQuery($sql);

?>
<form action=""  method="POST">
	<div class="col-xs-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                    	<th>Tên TK</th>
                        <th>Mật khẩu</th>
                        <th>Mức tài khoản</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>email</th>
                        <th>Địa chỉ</th>
                        <th colspan="2">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
	<?php 
		while($infoCustomer = $result->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $infoCustomer['username'];?></td>
				<td><?php echo $infoCustomer['passback'];?></td>
				<td><?php echo $infoCustomer['level'];?></td>
				<td><?php echo $infoCustomer['fullname'];?></td>
				<td><?php echo $infoCustomer['phone'];?></td>
				<td><?php echo $infoCustomer['email'];?></td>
				<td><?php echo $infoCustomer['address'];?></td>
				<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $infoCustomer['id'];?>">Cập nhật</button></td>	
				<td><button class="btn btn-danger btn-lg"><a href="xulyadmin/xoakh.php?id=<?php echo $infoCustomer['id'];?>"/>Xóa</a></button></td>	
			</tr>

  <!-- Modal -->
  				<div class="modal fade" id="myModal<?php echo $infoCustomer['id'];?>" role="dialog">
  				  <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Cập nhật thông tin người dùng</h4>
                    </div>
                    <div class="modal-body">
                        <form action="xulyadmin/themKH.php" method="POST">
                        <?php $current_url = base64_encode($_SERVER['REQUEST_URI']);?>
                        <input type="hidden" name="return_url" value="<?php echo $current_url;?>" />
                          <div class="form-group">
                        <label for="usernameUpdate">Tên tài khoản</label>
                        <input type="text" class="form-control" id="usernameUpdate" name="username" value="<?php  echo $infoCustomer['username']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="passUpdate">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="passUpdate"     value="<?php echo $infoCustomer['passback']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" class="form-control" name="fullname" id="fullnameUpdate" value="<?php echo $infoCustomer['fullname'];?>">
                      </div>
                      <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $infoCustomer['phone'];?>" require>
                      </div>
                      <div class="form-group">
                        <label for="emailUpdate">Email</label>
                        <input type="email" class="form-control" name="email" id="emailUpdate" value="<?php  echo $infoCustomer['email'];?>">
                      </div>
                      <div class="form-group">
                        <label for="levelUpdate">Mức người dùng</label>
                        <select name="level" class="form-control" id="levelUpdate">
                          <option value="0">Người dùng</option>
                          <option value="1">Admin</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="addressUpdate">Địa chỉ nhà</label>
                        <textarea name="address" class="form-control " id="addressUpdate" rows="5"><?php echo  $infoCustomer['address'];?></textarea>
                      </div>    
                      <div class="form-group" align="center">
                        <input type="submit" name="update" class="btn btn-info">
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
					 	<td><div id="good"></div></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td colspan="2"></td>
					 </tr>
	 			</tbody>
	 	

	 
	 
</table>
</form>
