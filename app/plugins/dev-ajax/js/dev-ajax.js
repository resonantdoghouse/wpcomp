(function ($) {

    var postUrl = 'http://localhost/wpcomp/wp/wp-json/wp/v2/posts/',
        postsArray,
        postId,
        currentIndex,
        nextPostIndex,
        prevPostIndex,
        $ajaxModalContent,
        $ajaxModalTitle,
        $ajaxModalWrapper,
        $prevButton,
        $nextButton,
        $modalWindow = '<div class="dev-ajax__modal--wrapper">' +
            '<button class="dev-ajax__modal--close">Close</button>' +
            '<div class="dev-ajax__modal--content">' +
            '<h1 class="dev-ajax__modal--content__title"></h1>' +
            '</div>' +
            '<nav>' +
            '<button class="dev-ajax__modal__button--prev">Prev</button>' +
            '<button class="dev-ajax__modal__button--next">Next</button>' +
            '</nav>' +
            '</div>';

    /**
     * Click Open Modal
     */
    $('.dev-ajax-post__link').on('click', function (e) {
        e.preventDefault();
        postId = $(this).attr('id');
        modalPostContent();
    });

    var modalPostContent = function () {

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: postUrl
        }).done(function (data) {

            postsArray = data;

            currentPostId = parseInt(postId);

            function findIndexByKeyValue(arraytosearch, key, valuetosearch) {
                for (var i = 0; i < arraytosearch.length; i++) {
                    if (arraytosearch[i][key] === valuetosearch) {
                        return i;
                    }
                }
                return null;
            }

            var currentIndex = findIndexByKeyValue(postsArray, "id", currentPostId);


            $('html').append($modalWindow).show('slow');

            $ajaxModalContent = $('.dev-ajax__modal--content');
            $ajaxModalTitle = $('.dev-ajax__modal--content__title');

            $prevButton = $('.dev-ajax__modal__button--prev');
            $nextButton = $('.dev-ajax__modal__button--next');


            if (currentIndex <= 0) {
                $prevButton.attr("disabled", true);
            }

            if (currentIndex === ( postsArray.length -1 ) ) {
                $nextButton.attr("disabled", true);
            }


            $ajaxModalWrapper = $('.dev-ajax__modal--wrapper').hide();

            // $ajaxModalContent.html(postsArray[currentIndex].content.rendered);

            $ajaxModalTitle.html(postsArray[currentIndex].title.rendered);

            $ajaxModalWrapper.fadeIn(500);


            /**
             * Click Events
             */
            $('.dev-ajax__modal--close').on('click', function () {
                $ajaxModalWrapper.fadeOut(250, function () {
                    $('.dev-ajax__modal--wrapper').detach();
                });
            });


            $nextButton.on('click', function (e) {
                e.preventDefault();

                if (currentIndex === (postsArray.length - 1)) {
                    $nextButton.attr("disabled", true);
                }
                else if (currentIndex < (postsArray.length - 1)) {
                    $nextButton.attr("disabled", false);
                    $prevButton.attr("disabled", false);
                    nextPostIndex = currentIndex++;

                    // $ajaxModalContent.html(postsArray[currentIndex].content.rendered);
                    $ajaxModalTitle.html(postsArray[currentIndex].title.rendered);

                }
                else {
                    $nextButton.attr("disabled", true);
                }


            });


            $prevButton.on('click', function (e) {
                e.preventDefault();


                if (currentIndex > 0) {
                    $prevButton.attr("disabled", false);
                    $nextButton.attr("disabled", false);

                    prevPostIndex = currentIndex--;

                    // $ajaxModalContent.html(postsArray[currentIndex].content.rendered);
                    $ajaxModalTitle.html(postsArray[currentIndex].title.rendered);
                }
                else {
                    $prevButton.attr("disabled", true);
                }


            });

        }).fail({});
    }

})(jQuery);