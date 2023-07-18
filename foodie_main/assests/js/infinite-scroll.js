jQuery(function($){
    var canBeLoaded = true,
        bottomOffset = 1000; // the distance from the bottom of the page at which to trigger loading more posts

    $(window).scroll(function(){
        if( canBeLoaded && $(document).scrollTop() > ($(document).height() - $(window).height() - bottomOffset) ) {
            console.log('cannot be load')
            canBeLoaded = false;
            var ajaxUrl =  $('.infinite-scroll-wrap').data('ajax-url');
            var page = parseInt( $('.infinite-scroll-wrap').attr('data-next-page') );
            var maxPages = parseInt( $('.infinite-scroll-wrap').attr('data-max-pages') );
            if( page <= maxPages ) {
                $('.infinite-scroll-wrap').addClass('loading');
                $.ajax({
                    url: ajaxUrl,
                    type: 'post',
                    data: {
                        action: 'infinite_scroll',
                        page: page,
                    },
                    success: function(html){
                        $('.infinite-scroll-wrap').append(html);
                        $('.infinite-scroll-wrap').removeClass('loading');
                        $('.infinite-scroll-wrap').attr('data-next-page', (page+1) );
                        canBeLoaded = true;
                    }
                });
            }
        } else console.log('cannot be loaded')
    });
});