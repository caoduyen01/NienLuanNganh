<?php 
	session_start();
	include_once("C:/xampp/htdocs/ban_hang/xuly/connection.php");
	$url = base64_decode($_SESSION['url']['index']);
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
</head>
<body>
	<?php  ?>

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
