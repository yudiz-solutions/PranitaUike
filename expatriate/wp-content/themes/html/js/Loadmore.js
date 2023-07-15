jQuery(function($) {
    var page = 1;
    $('body').on('click', '.theme-btn', function() {
        var button = $(this);
        var max_page = $('#max_num').val();
        page++;
        var data = {
            'action': 'load_more_story',
            'page': page,
        };
        $.ajax({
            url: news.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                button.text('Loading...');
            },
            success: function(data) {
                if (data) {
                    $('.load').append(data);
                    button.text('Load More');
                    if(page == max_page){
                        button.hide();
                    }
                    
                } else {
                    button.hide();
                }
            },
        });
    });
});
