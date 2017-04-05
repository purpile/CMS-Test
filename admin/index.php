<?php
ob_start();
session_start();
require '../include/_base.php';
require_once 'include/config.php';
require_once 'include/login.php';
$login = new login();


if(!isset($_SESSION['login'])){ ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="include/css/style.css"/>
<link rel="stylesheet" type="text/css" href="../include/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
		<div class="login-box">
		<h3 class="center"><?php $login->check_info(); ?></h3>
			<form class="col-md-12 form-box" method="post" action="">
				<input class="col-xs-12" type="text" name="login" placeholder="Login" required>
				<input class="col-xs-12" type="password" name="password" placeholder="Password" required>
				<button type="submit">Zaloguj</button>
			</form>
			<div class="form-box-down"></div>
		
		</div>
</body>
</html>
<?php }else{ ?>

<?php
$load = new load();
	$load->load_header();
	$load->load_content();
	$load->load_footer();

}
?>
