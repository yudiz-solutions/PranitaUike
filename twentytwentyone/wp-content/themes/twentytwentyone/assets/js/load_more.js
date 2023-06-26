jQuery(document).ready(function() {
    var page = 1;	
    jQuery('#load-more-button').click(function(){
		    data = {
			'action': 'my_load_more',
            'page' : page+1
		};
 

		jQuery.ajax({ 
			url : misha_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			success : function( data ){
                jQuery( ".pranita" ).append( data );
                page++; 
				 
			}
		});
	});
});

