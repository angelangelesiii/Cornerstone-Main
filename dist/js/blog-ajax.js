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

    function fadersInit(e) {
        $('.blog-item .excerpt').each(function(e) {
            console.log('excerpt: '+$(this).outerHeight());
            if($(this).outerHeight() >= 199) {
                console.log('higher');
                $(this).find('.fade').css('visibility','visible');
            }
        });
    }

    function appendPosts(resultData) {
        console.log("URL: " + restURL)
        console.log("page: " + postPage);
        // console.log(resultData);

        

        var blogContainer = $('.blog-container');
        var renderedHTML = '';

        for (i=0;i<resultData.length;i++){
            console.log(resultData[i]);

            var significant = '';

            if(resultData[i].acf.significant) {
                // significant += 'wide-2';
            }
            if(!resultData[i].better_featured_image) {
                significant += 'no-thumb';
            }
            

            // Rendered HTML
            renderedHTML += '<article class="blog-item grid-item '+significant+'">';
            renderedHTML += '<div class="container">';

            // ---
            if(resultData[i].better_featured_image) {
                renderedHTML += '<a href="'+resultData[i].link+'"><img src="'+resultData[i].better_featured_image.media_details.sizes.bg_small.source_url+'" alt="" class="post-image"></a>';
                // 
            }
            renderedHTML += '<div class="content">';
            if(resultData[i].better_featured_image) { // if has post thumbnail
                renderedHTML += '<span class="category item-meta">';
                renderedHTML += '<a href="'+resultData[i].cat_link+'">';
                renderedHTML += resultData[i].cats[0].name;
                renderedHTML += '</a>';
                renderedHTML += '</span>';
            }
            renderedHTML += '<h2 class="title">'+resultData[i].title.rendered+'</h2>';
            if(!resultData[i].better_featured_image) { // if has no post thumbnail
                renderedHTML += '<span class="category item-meta">';
                renderedHTML += '<a href="'+resultData[i].cat_link+'">';
                renderedHTML += resultData[i].cats[0].name;
                renderedHTML += '</a>';
                renderedHTML += '</span>';
            }
            renderedHTML += '<span class="author date item-meta">';
            renderedHTML += 'by ' + resultData[i].author_name;
            if(resultData[i].date_formatted) {
                renderedHTML += ' on ' + resultData[i].date_formatted;
            }
            renderedHTML += '</span>'
            if(!resultData[i].better_featured_image) { // if has no post thumbnail
                renderedHTML += '<p class="excerpt">';
                renderedHTML += resultData[i].excerpt_u;
                renderedHTML += '<span class="fade"></span></p>';
                renderedHTML += '<p class="read-more">';
                renderedHTML += '<a href="'+resultData[i].link+'">Read More &raquo;</a></p>';
                renderedHTML += '</p>';
            }
            renderedHTML += '</div>'; // content
            // ---

            renderedHTML += '</div>'; // container
            renderedHTML += '</article>';
        }

        var $items = $(renderedHTML);
        $items.imagesLoaded(function() {
            blogContainer.append($items).masonry('appended', $items);
            blogContainer.masonry('reloadItems');
            fadersInit();
        });

    } // end appendPosts function

});