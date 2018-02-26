(function ($) {

    // console.log(redsprout_vars.comments_open);

    $('#close-comments').on('click', function (e) {
        e.preventDefault();

        var commentStatus;

        if(redsprout_vars.comments_open){
            commentStatus = 'closed';
        } else {
            commentStatus = 'open';
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

            alert('Success! Comments are ' + commentStatus + ' for this post.');

        });
    });

})(jQuery);