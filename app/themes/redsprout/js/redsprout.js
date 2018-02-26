(function ($) {

    // console.log(wpbasic_vars.comments_open);

    $('#close-comments').on('click', function (e) {
        e.preventDefault();

        var commentStatus;

        if(wpbasic_vars.comments_open){
            commentStatus = 'closed';
        } else {
            commentStatus = 'open';
        }

        $.ajax({
            method: 'post',
            url: wpbasic_vars.rest_url + 'wp/v2/posts/' + wpbasic_vars.post_id,
            data: {
                comment_status: commentStatus
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', wpbasic_vars.wpapi_nonce);
            }
        }).done(function (response) {

            alert('Success! Comments are ' + commentStatus + ' for this post.');

        });
    });

})(jQuery);