<?php 
check_session();
require 'include/elements.php';
$elements = new elements();
$elements->create_new_website();

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 'home';
?>

<?php if($page == 'home' || $page== 'admin'){ ?>
<form action="" method="POST" class="add_website">
	<label>Utwórz nową stronę: </label>
	<input class="input-style mid" name="website_name" placeholder="Wprowadź nazwę strony">
	<button type="submit" class="unbutton"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
</form>

<ul class="menu_elements">
	<?php $elements->print_menu(); ?>
</ul>
<?php } ?>