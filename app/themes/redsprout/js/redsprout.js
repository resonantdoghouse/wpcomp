(function ($) {

    var commentStatus;
    if (redsprout_vars.comments_open) {
        commentStatus = 'open';
    } else {
        commentStatus = 'closed';
    }

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
            url: redsprout_vars.rest_url + 'wp/v2/posts/' + redsprout_vars.post_id,
            data: {
                comment_status: commentStatus
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', redsprout_vars.wpapi_nonce);
            }
        }).done(function (response) {
            $('.comment-status').empty();
            $('#close-comments').after('<p class="comment-status">Comments are now ' + commentStatus + ' for this post.</p>');
        });
    });

})(jQuery);