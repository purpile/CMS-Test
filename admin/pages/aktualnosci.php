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


<div class="text-padding">
<?php if(!isset($_GET['edit'])){ ?>
	<ul>
	<?php $elements->generate_news();?>
	</ul>
<?php } else { 
	$elements->save_current_news();
	$elements->generate_current_news();
}
?>
<div class="clearfix"></div>
</div>
<script>
$(function() {
	$( "#calendar" ).datepicker();   
}); 


CKEDITOR.replace( 'lead' );

</script>