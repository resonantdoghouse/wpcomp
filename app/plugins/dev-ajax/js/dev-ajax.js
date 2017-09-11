(function ($) {

    var postUrl = 'http://localhost/wpcomp/wp/wp-json/wp/v2/posts/',
        postId = 1,
        html = '';

    $('.site-header').prepend('<div class="ajax-post"></div><div class="ajax-post__content"></div>');


    // initial call to load data
    $.ajax({
        method: 'GET',
        dataType: 'json',
        url: postUrl,
    }).done(function (data) {

        $.each(data, function (i, val) {

            html = '<a class="ajax-post__link" href="' + val.link + '" id="' + val.id + '">';
            html += val.title.rendered;
            html += '</a>';

            $('.ajax-post').append(html);

        });

        // initial click handler
        $('.ajax-post__link').on('click', function (e) {
            e.preventDefault();
            postId = $(this).attr('id');
            getPostContent();

        });

    }).fail({});


    var getPostContent = function () {

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: postUrl + postId,
        }).done(function (data) {

            $('.ajax-post__content').html(data.excerpt.rendered);
            $('.modal-content').html(data.content.rendered);
            $("#demo01").click();

        }).fail({});
    }

    $('.site-header').append('<a id="demo01" href="#animatedModal">DEMO01</a>');
    $('.site-header').append('<div id="animatedModal"><div class="close-animatedModal">CLOSE MODAL</div><div class="modal-content">Content</div></div>');


    $("#demo01").animatedModal({
        "color": "pink",
        "animationDuration": ".6s",
        "animatedIn": "fadeInDownBig"
    });


})(jQuery);