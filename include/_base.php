<?php

define ("DB_PREFIX", "strona");

class db{

	static public function connect(){
		$server = "localhost";
		$login = "root";
		$password = "lol123";
		$db_name = "strona";
		
		$connect = new mysqli($server, $login, $password, $db_name);
		mysqli_set_charset($connect,"utf8");
		if($connect==FALSE){
			echo 'Problem z polaczeniem bazy danych';
		}
		else{
			return $connect;
		}

	}
}

