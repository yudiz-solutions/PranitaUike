
$(document ).ready(function(jQuery) {
    var paged = 1;
    var loading = false;
    var $loadMoreButton = $('#load-more-button');
    var $postContainer = $('#post-container');

    $loadMoreButton.on('click', function(e) {
        e.preventDefault();

        if (!loading) {
            loading = true;
            $loadMoreButton.text('Loading...');

            $.ajax({
                url: misha_loadmore_params.ajaxurl,
                type: 'POST',
                data: {
                    action: 'loadmore',
                    paged: paged
                },

                success: function(response) {
                    $postContainer.append(response);
                    paged++;
                    loading = false;
                    $loadMoreButton.text('Load More');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }

            });
        } else {
        	button.remove(); // if no data, remove the button as well
        	
        }
    });
});
wp_reset_postdata();




// jQuery(function(jQuery){ 
// 	jQuery('.misha_loadmore').click(function(){
 
// 		var button = jQuery(this),
// 		    data = {
// 			'action': 'my_load_more',
// 			'query': misha_loadmore_params.posts, 
// 			'page' : misha_loadmore_params.current_page,
//             'paged' : 1,
// 		};
 
// 		jQuery.ajax({ 
// 			url : misha_loadmore_params.ajaxurl, // AJAX handler
// 			data : data,
// 			type : 'POST',
// 			beforeSend : function ( xhr ) {
// 				button.text('Loading...'); 
// 			},
// 			success : function( data ){
// 				if( data ) { 
// 					button.text( 'More posts' ).prev().before(data); 
// 					misha_loadmore_params.current_page++;
 
// 					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
// 						button.remove(); 
 
					
// 					// jQuery( document.body ).trigger( 'post-load' );
// 				} else {
// 					button.remove(); // if no data, remove the button as well
// 				}
// 			}
// 		});
// 	});
// });
