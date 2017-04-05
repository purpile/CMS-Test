<?php

class elements {
	
	private $con;
	private $page;
	
	function __construct(){
		$this->con = db::connect();	
		if(isset($_GET['page']))
			$this->page = $_GET['page'];
	}
	
	function print_menu(){
		$sql = $this->con->query("SELECT name, id_menu FROM ".DB_PREFIX."_menu WHERE admin=0 AND parent IS NULL");
		while($get = $sql->fetch_object()){
			echo '<li>'.$get->name.' <a href="javascript:void(0)" onclick="delete_page('.$get->id_menu.')"><i class="fa fa-minus-square-o pull-right" aria-hidden="true"></i></a></li>';
		}
		
	}
		
	function create_new_website(){
		if(isset($_POST['website_name'])){
			$template = $_POST['template'];
			$create_new_website = $_POST['website_name'];
			$friendly = friendly_url($create_new_website);
			$add = $this->con->query("INSERT INTO ".DB_PREFIX."_menu (name, link, template) VALUES ('$create_new_website', '$friendly', 'default')");		
			reload(0);
		}
	}
				
	function generate_news(){
		$sql = $this->con->query("SELECT title, id_news, title, date FROM ".DB_PREFIX."_news ORDER BY date DESC ");
		while($get = $sql->fetch_object()){
			echo '<a href="?page='.$this->page.'&edit=true&id_news='.$get->id_news.'"><li>'.$get->title.' <a href="javascript:void(0)" onclick="delete_page('.$get->id_news.')"><i class="fa fa-minus-square-o pull-right" aria-hidden="true"></i></a><div class="pull-right">'.substr($get->date, 0, 10).'</div></li></a>';
		}
	}

				
	function generate_current_news(){
		$id = $_GET['id_news'];
		$sql = $this->con->query("SELECT title, id_news, lead, text, title, date FROM ".DB_PREFIX."_news WHERE id_news=$id");
		$get = $sql->fetch_object();
		echo
		'<form action="" method="POST">
			<label class="label-style">Tytuł: </label><input name="title"  value="'.$get->title.'" class="input-style small"><br>
			<label class="label-style">Data: </label><input id="calendar" name="date" value="'.$get->date.'" class="input-style small"><br>
					<hr />
			<label class="label-style">Lead / Zajawka:</label>
			<textarea name="lead" id="lead"  class="input-style full">'.$get->lead.'</textarea>
					<div class="space"></div>
			<label class="label-style">Treść:</label>
			<textarea  name="text" class="input-style full">'.$get->text.'</textarea>
			<div class="clearfix"></div>
			<button class="btn" value="'.$id.'" name="save_current_news" type="submit">Zapisz</button>
		</form>
		';
	}
				
	function save_current_news(){
		if(isset($_POST['save_current_news'])){
			$id = $_POST['save_current_news'];
			$lead = $_POST['lead'];
			$title = $_POST['title'];
			$date = $_POST['date'];
			$text = $_POST['text'];
			$update = $this->con->query("UPDATE ".DB_PREFIX."_news set title='$title', date='$date', lead='$lead', text='$text' WHERE id_news=$id ");
			if($update){
				alert("Zmiany zostały zapisane !");
			}
				reload(0);
			
		}
	}	
}

?>