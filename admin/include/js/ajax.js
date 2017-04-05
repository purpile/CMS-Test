function delete_page(log) {
 var ask = confirm('Czy na pewno chcesz usunąć ?');
 
 if (ask) {
  $.ajax({
   type: "POST",
   url: "include/ajax.php",
   processdata: false,
   data: "delete_page=true&delete_id="+log,
   success: function(data) {
		location.reload(); 
   }             
  });
 }
}

