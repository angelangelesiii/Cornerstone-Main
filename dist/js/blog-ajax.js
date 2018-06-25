// ==================================
//    BLOG AJAX
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    console.log('loaded');

    var postLoaderBtn = $('#post-loader'),
        postPage = 2,
        postPerPage = blogPageData.postNum,
        maxNumPosts = 0,
        maxNumPages = 0,
        lastPagePostCount = 0,
        restURL = blogPageData.jsonURL + '/wp/v2/posts?per_page=' + postPerPage + '&page=' + postPage + '';

    // On Page Load
    $.ajax({
        url: restURL,
        type: 'GET',
        data: {action: 'createHTML'},
        dataType: 'json',
        success: function(result, textStatus, request) {
            // figure out the max number of pages
            maxNumPosts = request.getResponseHeader('X-WP-Total');
            maxNumPages = Math.ceil(maxNumPosts/postPerPage);
            lastPagePostCount = maxNumPosts%postPerPage;
        }
    });

    // Button clicked
    postLoaderBtn.click(function(e) {
        event.preventDefault();

        var preClickText = $(this).html();

        // Change text to loading while posts load
        $(this).html('Loading...');

        console.log('posts per page: ' + postPerPage);

        $.ajax({
            url: restURL,
            type: 'GET',
            data: {action: 'createHTML'},
            dataType: 'json',
            success: function(result, textStatus, request) {

                // Increment the page
                postPage++;

                // return the button to its original text
                postLoaderBtn.html(preClickText);

                // figure out the max number of pages
                maxNumPosts = request.getResponseHeader('X-WP-Total');
                console.log("----------------- LOAD "+(postPage-1)+"  -------------------------");
                console.log("next URL: " + restURL)
                console.log("post per page: " + postPerPage);
                console.log("max number of pages: " + maxNumPages);
                console.log("last page posts count: " + lastPagePostCount);
                console.log("total of " + maxNumPosts + " posts.");
                restURL = blogPageData.jsonURL + '/wp/v2/posts?per_page=' + postPerPage + '&page=' + postPage + '';

                if(postPage > maxNumPages) {
                    postLoaderBtn.hide();
                    $('#post-end').show();
                }

                // finally append posts
                appendPosts(result);

            }
        });

    });

    function appendPosts(resultData) {
        console.log("URL: " + restURL)
        console.log("page: " + postPage);
        console.log(resultData);

        var blogContainer = $('.blog-container');
        var renderedHTML = '';

        for (i=0;i<resultData.length;i++){
            renderedHTML += '<article class="blog-item grid-item">';
            renderedHTML += '<div class="container">';
            renderedHTML += '<div class="content">';
            renderedHTML += '<h2>'+resultData[i].title.rendered+'</h2>';
            renderedHTML += '</div>'; // content
            renderedHTML += '</div>'; // container
            renderedHTML += '</article>';
        }

        var $items = $(renderedHTML);
        blogContainer.append($items).masonry('appended', $items);


    } // end appendPosts function

});