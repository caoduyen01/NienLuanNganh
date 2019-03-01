<!DOCTYPE html>
<html>
<head>
	<title>Quản trị nội dung website</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="/ban_hang/css/aindex.css">
</head>
<body>
	<?php session_start(); ?>
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
