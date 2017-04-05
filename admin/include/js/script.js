function delete_img(page, id) {
	var ask = confirm('Czy na pewno chcesz usunąć zdjęcie główne ?');
	
	if (ask) {
		$.ajax({
			type: "POST",
			url: "include/ajax/"+page+".php",
			processdata: false,
			data: "delete_img=true&page="+page+"&id="+id,
			success: function(data) {
				window.location.reload();
			}	            
		});
	}
}






CKEDITOR.replace( 'text' );





