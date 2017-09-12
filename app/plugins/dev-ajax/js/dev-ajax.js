(function ($) {

    var postUrl = 'http://localhost/wpcomp/wp/wp-json/wp/v2/posts/',
        postId = 1,
        html = '';

    $('.ajax-post__link').on('click', function (e) {
        e.preventDefault();
        postId = $(this).attr('id');
        getPostContent();
    });

    var getPostContent = function () {
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: postUrl + postId,
        }).done(function (data) {

            $('#dev-ajax-loader').html(data.excerpt.rendered);

        }).fail({});
    }

})(jQuery);