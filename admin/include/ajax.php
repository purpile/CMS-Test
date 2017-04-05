<?php
require '../../include/_base.php';
require 'functions.php';
session_start();
$con = db::connect();

if(isset($_POST['logout'])){
	$logout = $_POST['logout'];
	session_destroy();
	redirect("../");
	echo "dsdsds";
}

if(isset($_POST['delete_id'])){
	$delete_id = $_POST['delete_id'];
	$delete = $con->query("DELETE FROM ".DB_PREFIX."_menu WHERE id_menu=$delete_id");
}
?>