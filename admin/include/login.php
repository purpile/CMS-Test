<?php

class login {
	private $con;
	
	function __construct(){
		$this->con = db::connect();			
	}
	
	function check_info(){
		if(isset($_POST['login'])){
			$login = $_POST['login'];
			$password = $_POST['password'];

			$sql = $this->con->query("SELECT login, password FROM ".DB_PREFIX."_users WHERE login='$login' AND password='$password'");
			$num_rows = $sql->num_rows;
			if($num_rows > 0){
				$get = $sql->fetch_object();
				if($get->login == $login && $get->password == $password){
					$_SESSION['login'] = $login;
					reload(0);
				}
			}
			else
				echo 'Problem z logowaniem';
			
		}
		else
			echo 'Zaloguj się';
	}
	
}

?>