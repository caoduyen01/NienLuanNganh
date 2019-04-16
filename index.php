<!DOCTYPE html>
<html>
<head>
	<title>Web bán hàng Cao Duyên </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/modali.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['url']['index']))
			$_SESSION['url']['index'] = base64_encode($_SERVER['REQUEST_URI']);
			
	 ?>
	<div class="wrap">
		<?php 
		include ("xuly/connection.php");
			include_once("modules/header.php");
			include_once("modules/menu.php");
			include_once("modules/content.php");
			include_once("modules/footer.php");
		 ?>
	</div>
</body>
</html>