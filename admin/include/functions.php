<?php

function check_session(){
	if(!isset($_SESSION['login']))
		redirect("admin");
}

function redirect($str){
	header("Location:".$str);
}

function upper($str){
	$str = ucfirst($str);
	return $str;
}

function reload($time){
	header("Refresh:".$time);
}

function friendly_url($str){
	$pl = array('ą','ś','ć','ę','ł','ż','ź','ó',' ','Ą','Ś','Ć','Ę','Ł','Ż','Ź','Ó');
	$en = array('a','s','c','e','l','z','z','o','-','a','s','c','e','l','z','z','o');
	
	$str = str_replace($pl, $en, $str);
	
	return $str;
}
function alert($str){
	echo '<script>alert("'.$str.'");</script>';
}
?>