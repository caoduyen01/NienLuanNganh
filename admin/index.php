<?php 
	session_start();
	include_once("C:/xampp/htdocs/ban_hang/xuly/connection.php");
	 $url =  isset($_SESSION['url']['index'])?base64_decode($_SESSION['url']['index']):"/ban_hang/index.php";
	if(isset($_SESSION['name'])){
		$sql = "select * from account where username='".$_SESSION['name']."'";
		$query = connectTakeQuery($sql);
		$level = $query->fetch_assoc();
			if($level['level'] == 1){
			}
			else {
				header("Location:".$url);
			}
	}
	else{
		header("Location:".$url);
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản trị nội dung website</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/ban_hang/css/aindex.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="wrap">
		<?php 
			include ("modules/header.php");
			include  ("modules/menu.php");
			include ("modules/content.php");
			include ("modules/footer.php");
		 ?>
	</div>
</body>
</html>
