<?php $load = new load(); ?>
<!DOCTYPE HTML>

<html>

<head>
	
	<title>Funkcja na tytul</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="SEO KEYWORDS FUNKCJA">
	
	<!-- Java Script -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../include/boostrap/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>


	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../include/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="include/css/style.css"/>
	<link rel="stylesheet" href="../include/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	</head>
<body>

<!-- Nawigacja -->
<div class="admin-bar">
	<div class="container">
		<ul class="bar-panel">
			<li>Witaj <strong class="silver"><?php echo upper($_SESSION['login']); ?></strong></li>
			<li><form action="include/ajax.php" method="POST"><button name="logout" type="submit" class="unbutton">Wyloguj</button></form></li>
		</ul>
	</div>
</div>

<div class="menu">
	<div class="container">
		<?php $load->generate_menu(); ?>
	</div>
</div>

<div class="container padding">
