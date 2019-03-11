<!DOCTYPE html>
<html>
<head>
	<title>Web bán hàng Cao Duyên </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
</head>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['url']['index']))
			$_SESSION['url']['index'] = base64_encode($_SERVER['REQUEST_URI']);
			
	 ?>
	<div class="wrap">
		<?php 
			include_once("modules/header.php");
			include_once("modules/menu.php");
			include_once("modules/content.php");
			include_once("modules/footer.php");
		 ?>
	</div>
</body>
</html>
</body>
</html>