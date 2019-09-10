(function ($) {

    let $likeCountEl = $('#rest-like-count');

    let commentStatus;

    if (rest_vars.comments_open) {
        commentStatus = 'open';
    } else {
        commentStatus = 'closed';
    }

    /*
     * Open & Close Comments with REST API
     */
    $('#close-comments').on('click', function (e) {
        e.preventDefault();

        if (commentStatus === 'closed') {
            $('#close-comments').text('Close Comments');
            commentStatus = 'open';
        } else if (commentStatus === 'open') {
            $('#close-comments').text('Open Comments');
            commentStatus = 'closed';
        }

        $.ajax({
            method: 'post',
            url: rest_vars.rest_url + 'wp/v2/posts/' + rest_vars.post_id,
            data: {
                comment_status: commentStatus
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', rest_vars.wpapi_nonce);
            }
        }).done(function (response) {
            $('.comment-status').empty();
            $('#close-comments').after(`
                <p class="comment-status">
                    Comments are now ${commentStatus} for this post.
                </p>`);
        });
    });

    /**
     * Add likes to post meta, see functions.php for custom endpoints
     */
    $('#rest-like-btn').on('click', function () {
        let likeCount = parseInt($likeCountEl.text());

        $.ajax({
            method: 'post',
            url: rest_vars.rest_url + 'rest/v1/like',
            data: {
                id: rest_vars.post_id,
                user: rest_vars.user_id,
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', rest_vars.wpapi_nonce);
            }
        }).done(function (data) {
            likeCount ++;
            $('#rest-like-count').text(likeCount);
        }).fail(function(err){
            console.log('error', err);
        });
    });


})(jQuery);