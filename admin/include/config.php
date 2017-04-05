<?php
require 'include/functions.php';

class load {
	private $con;
	private $page;
	
	function __construct(){
		$this->con = db::connect();
		if(isset($_GET['page'])) 
			$this->page = $_GET['page'];
		else
			$this->page = 'admin';
	}
	
	function load_header(){
		require 'include/header.php';
	}
	
	function load_content(){
		if($this->page != 'edit'){
		$sql = $this->con->query("SELECT * FROM ".DB_PREFIX."_menu WHERE admin=1 and link='$this->page'");
		$get = $sql->fetch_object();
		
		include 'pages/'.$get->template.'.php';
		}
	}
	
	function load_footer(){
		require 'include/footer.php';
	}
	
	function generate_menu(){
		$sql = $this->con->query("SELECT name, link FROM ".DB_PREFIX."_menu WHERE admin=1");
		while($get = $sql->fetch_object()){
			
			if($get->link == $this->page)
				$active = 'active';
			else
				$active = '';
			echo '<li class="menu-btn '.$active.'"><a href="?page='.$get->link.'">'.$get->name.'</a></li>';
		}		
	}
	
}

?>