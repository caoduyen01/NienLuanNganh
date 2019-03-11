<?php 
		require_once "C:/xampp/htdocs/ban_hang/xuly/connection.php";
		$sql = "SELECT account.id as 'id',account.username as 'username' ,account.passback as 'passback',"
			  ."account.level as 'level',khachhang.fullname as 'fullname',"
			  ."khachhang.phone as 'phone',khachhang.email as 'email',khachhang.address as 'address'"
			  ." FROM account,khachhang where account.id = khachhang.idaccount ";
		$result = connectTakeQuery($sql);
	 ?>
<form action=""  method="POST">
<table>
	<tr class="row-customer">
		<th>Tên TK</th>
		<th>Mật Khẩu</th>
		<th>mức TK</th>
		<th>Họ tên</th>
		<th>SĐT</th>
		<th>email</th>
		<th>Địa chỉ</th>
		<th colspan="2">quản lý</th>
	</tr>
	<?php 
		$IDarray = array();
		while($infoCustomer = $result->fetch_assoc()){
			echo "<tr>";
			echo 	"<td><span>".$infoCustomer['username']."</span></td>";
			echo 	"<td><span>".$infoCustomer['passback']."</span></td>";
			echo 	"<td><span>".$infoCustomer['level']."</span></td>";
			echo 	"<td><span>".$infoCustomer['fullname']."</span></td>";
			echo 	"<td><span>".$infoCustomer['phone']."</span></td>";
			echo 	"<td><span>".$infoCustomer['email']."</span></td>";
			echo 	"<td><span>".$infoCustomer['address']."</span></td>";
			echo 	"<td><span ><a href='xulyadmin/xoakh.php?id=".$infoCustomer['id']."'/>Xóa</a></span></td>";
			echo    "<td><button id='btn".$infoCustomer['id']."'>asd</td>";
			$IDarray[$infoCustomer['id']] = array($infoCustomer['id']=>$infoCustomer['username']);
			echo "</tr>";
	}
	 ?>
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
	 
</table>
</form>
<div id="gogo"></div>
	 <button id='btn1'class='btn'  onclick="la()">Cập nhật</button>
<script type="text/javascript">
	/*
		function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("gogo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "abc.txt", true);
  xhttp.send();
}


$("button").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/pages/test/",
        data: { 
            id: $(this).val(), // < note use of 'this' here
            access_token: $("#access_token").val() 
        },
        success: function(result) {
            document.getElementById('gogo').value = 'lalalalal';
        },
        error: function(result) {
            document.getElementById('gogo').value = 'lalalalal';
        }
    });
});
function loadUpdate(str){
	document.addEventListener("DOMContentLoaded",function(str){
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("good").innerHTML = this.responseText;
		    }
		  }
		  xhttp.open("GET", "modules/left/capnhatnhanvien.php?call="+str, true);
		  xhttp.send();
	},false);
   
}*/

function Update(str){
	document.addEventListener("DOMContentLoaded",LoadValue(str),false)
}

function LoadValue(str){
	document.getElementById("username").value = str;
}
function la(){
	var lala = document.getElementById(btn1).name;
	alert(lala);
}

</script>