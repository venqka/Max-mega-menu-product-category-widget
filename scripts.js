jQuery(document).ready(function(){
	
	var container = jQuery('.dnmmm-widget-content-wrap');

	// jQuery('li.mega-menu-item').on('open_panel', function() {
    	
    	jQuery('.max-mega-menu li').hover(function(){

	    	var target = jQuery(this);

	    	var targetUrl = target.find('a').attr('href');

			jQuery('.dnmmm-widget-content-wrap').html(targetUrl);

		});//on li hover
    
    // });//on open panel
	

});
