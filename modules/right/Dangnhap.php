
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/ban_hang/css/dangnhap.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function(){
			var submit = document.getElementById('submit');
			submit.addEventListener("click",CheckAccfault);
		});
function CheckAccfault(){
	var name = document.myform.username.value;
    var pass = document.myform.password.value;
	var xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function() {
	         if (this.readyState == 4 && this.status == 200) {
	         	alert(this.responseText)
		    }
	   };
	xhttp.open("POST", "saigiatri.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("name="+name+"&pass="+pass);
}
	</script>
</head>
<body> 
	<form name="myform" action="/ban_hang/xuly/xulydangnhap.php" method="post">
		<h1>Đăng nhập</h1>
		<input placeholder="Username" type="text" name="username" required></td>
		<input placeholder="Password" type="password" name="password" required></td>
		<div id="err"></div>
		<button id="submit">Đồng ý</button>
	</form>
</body>
</html>

	
