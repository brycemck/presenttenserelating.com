jQuery(document).ready(function($){
	
	$('.carousel').carousel({
	  interval: new_zea_slider_speed.vars
	});
	
	$("#search-button").click(function(){
			$(".serch-form-coantainer").animate({
            width: 'toggle'
        });
		$( ".top-bar .search-top" ).focus();
    });

	$('.sticky-post .sticky-wrapper').hover(function(){     
        $(this).find('.entry-header').fadeIn(500); 
    },     
    function(){    
        $(this).find('.entry-header').fadeOut(500);
    });
	

});