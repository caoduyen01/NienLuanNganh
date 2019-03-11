
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/ban_hang/css/dangnhap.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		var a,b;
		function check(){
			var name = document.myform.name.value;
			a = checkinfo();
			b = notFindUser(name);
			if ( ) {
				//return false;
			}
		}
		function checkinfo(){
			var name = document.myform.name.value;
        	var password = document.myform.password.value;
			if( name == '' || password == ''){
				 document.getElementById("err").innerHTML="Vui lòng nhập đủ thông tin";
				 return false;
				}
			else{
				document.getElementById("err").innerHTML="";
				return true;
			}
		}
		document.addEventListener('DOMContentLoaded', function () {
				var el = document.getElementById("submit");
				if(el){
					el.addEventListener('click', function(){
						 var xhttp = new XMLHttpRequest();
						  xhttp.onreadystatechange = function() {
						    if (this.readyState == 4 && this.status == 200) {
						      document.getElementById("err").innerHTML =
						      this.responseText;
						    }
						  };
						  xhttp.open("GET", "saigiatri.php?rq="+str, true);
						  xhttp.send();
					}, false);
				}
			});

		/*function notFindUser(str){
			document.addEventListener('DOMContentLoaded', function () {
				var el = document.getElementById("submit");
				if(el){
					el.addEventListener('click', function(){
						 ajaxFindUser(str);
					}, false);
				}
			});

			var nameerr = "Không tồn tại tên đăng nhập"
			var err = document.getElementById("err").value;
			if(err == name){
				return false;
			} 
			else{
				return true;
			}
			function ajaxFindUser(str){
			var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			      document.getElementById("err").innerHTML =
			      this.responseText;
			    }
			  };
			  xhttp.open("GET", "saigiatri.php?rq="+str, true);
			  xhttp.send();
		}
		}*/
	</script>
</head>
<body> 
	<form name="myform" action="/ban_hang/xuly/xulydangnhap.php" method="post" onsubmit="return check()">
		<h1>Đăng nhập</h1>
		<input placeholder="Username" type="text" name="username" ></td>
		<input placeholder="Password" type="password" name="password" ></td>
		<div id="err"></div>
		<button id="submit">Đồng ý</button>
	</form>
</body>
</html>

	
