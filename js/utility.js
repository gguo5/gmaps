$(document).ready(function(){
						   
	//toggle element in page
	var linkToggle = $("<div id='button_toggle' class='show_b'></div>");
	$("#button_container").append(linkToggle);	
	linkToggle.click(function() {	

		if ( $(this).hasClass("active") )
			{
				$(this).removeClass("active");					
				$('.toggle_class').toggle('slow');
			
			}
		else
			{
				$(this).addClass("active");					
				$('.toggle_class').toggle('slow');
			}
		
	});	
							  
});