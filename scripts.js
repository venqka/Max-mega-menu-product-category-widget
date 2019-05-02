jQuery(document).ready(function(){
	
	var container = jQuery('.dnmmm-widget-content-wrap');

	// jQuery('li.mega-menu-item').on('open_panel', function() {
    	
    	jQuery('.max-mega-menu li').hoverIntent(function(){

	    	var target = jQuery(this);
	    	
	    	if(target.hasClass('mega-menu-item-object-product_cat') ) {
	    	
		    	var targetUrl = target.find('a').attr('href');
		    	var urlArray = targetUrl.split('/');

				var slug = urlArray[urlArray.length-2];
		  		
		    	jQuery.ajax({
		        	url: dnmmm_ajax.ajax_url,
		        	type: 'POST',
		        	data: {
						action: 'get_category_info',
						categoryUrl: slug
			        },
			        success : function(category_info) {
			        	jQuery('.dnmmm-widget-content-wrap').html(category_info);
			        },
			        error : function(error) {
						console.log(error);
					}
				});
			}	

		});//on li hover
    
    // });//on open panel
	

});
