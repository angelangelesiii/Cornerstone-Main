// ==================================
//    BLOG AJAX
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    console.log('loaded');
    console.log(ajaxpagination.ajaxurl);

    $('#post-loader').click(function(e) { // Button clicked
        event.preventDefault();

        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'POST',
            dataType: 'html',
            data: {
                action: 'blog_ajax'
            },
            success: function( result ) {
                alert( result );
            },
            error : function(jqXHR, textStatus, errorThrown) {
		        console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		    }
        })

    })

});