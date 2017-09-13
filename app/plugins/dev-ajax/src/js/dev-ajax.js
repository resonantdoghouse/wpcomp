(function ($) {

    /**
     * jQuery Plugin
     * animate fade in
     */
    $.fn.animateFadeIn = function () {
        this.hide().fadeIn('slow');
    };

    $.fn.animateFadeOut = function () {
        this.fadeOut('slow');
    };

    // http://localhost:3000/wpcomp/wp/wp-json/wp/v2/basses?_embed&manufacturer=10

    var postUrl = 'http://localhost:3000/wpcomp/wp/wp-json/wp/v2/basses?_embed&manufacturer=10',
        postsArray,
        postId,
        currentIndex,
        nextPostIndex,
        prevPostIndex,
        $ajaxModalContent,
        $ajaxModalTitle,
        $ajaxModalImage,
        $ajaxModalWrapper,
        $prevButton,
        $nextButton,
        $modalWindow = '' +
            // modal container
            '<div class="dev-ajax__modal--wrapper">' +

            // close modal
            '<button class="dev-ajax__modal--close">Close</button>' +

            // nav
            '<nav class="dev-ajax__modal__nav">' +
            '<button class="dev-ajax__modal__button--prev">Prev</button>' +
            '<button class="dev-ajax__modal__button--next">Next</button>' +
            '</nav>' +

            // content
            '<div class="dev-ajax__modal--content">' +
            '<h1 class="dev-ajax__modal--content__title">{{title}}</h1>' +
            '<img class="dev-ajax__modal--content__image" src="">' +
            '<div class="dev-ajax__modal--content__post"></div>' +
            '</div>' +

            '</div>'; // modal container

    /**
     * Click: open Modal & init Ajax request
     */
    $('.dev-ajax-post__link').on('click', function (e) {
        e.preventDefault();
        postId = $(this).attr('id');
        modalPostContent();
    });

    /**
     * Find index of array
     */
    function findIndexByKeyValue(arraytosearch, key, valuetosearch) {
        for (var i = 0; i < arraytosearch.length; i++) {
            if (arraytosearch[i][key] === valuetosearch) {
                return i;
            }
        }
        return null;
    }

    var modalPostContent = function () {

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: postUrl
        }).done(function (data) {

            postsArray = data;

            currentPostId = parseInt(postId);
            currentIndex = findIndexByKeyValue(postsArray, "id", currentPostId);

            $('html').append($modalWindow).show('slow');

            $ajaxModalContent = $('.dev-ajax__modal--content__post');
            $ajaxModalTitle = $('.dev-ajax__modal--content__title');
            $prevButton = $('.dev-ajax__modal__button--prev');
            $nextButton = $('.dev-ajax__modal__button--next');

            if (currentIndex <= 0) {
                $prevButton.attr("disabled", true);
            }

            if (currentIndex === ( postsArray.length - 1 )) {
                $nextButton.attr("disabled", true);
            }

            $ajaxModalWrapper = $('.dev-ajax__modal--wrapper').hide();
            $ajaxModalImage = $('.dev-ajax__modal--content__image');


            $ajaxModalTitle.html(postsArray[currentIndex].title.rendered).animateFadeIn();
            $ajaxModalContent.html(postsArray[currentIndex].content.rendered).animateFadeIn();
            $ajaxModalImage.attr('src', postsArray[currentIndex].better_featured_image.source_url);

            $ajaxModalWrapper.fadeIn(600);

            /**
             * Close Modal
             */
            $('.dev-ajax__modal--close').on('click', function () {

                $ajaxModalWrapper.fadeOut(250, function () {
                    $('.dev-ajax__modal--wrapper').detach();
                });

            });

            /**
             * Next Button Click
             */
            $nextButton.on('click', function (e) {
                e.preventDefault();

                if (currentIndex !== (postsArray.length - 1)) {

                    nextPostIndex = currentIndex++;

                    $nextButton.attr("disabled", false);
                    $prevButton.attr("disabled", false);

                    $ajaxModalTitle.html(postsArray[currentIndex].title.rendered).animateFadeIn();
                    $ajaxModalContent.html(postsArray[currentIndex].content.rendered).animateFadeIn();
                    $ajaxModalImage.attr('src', postsArray[currentIndex].better_featured_image.source_url).animateFadeIn();

                }
                else if (currentIndex < (postsArray.length - 1)) {

                    $nextButton.attr("disabled", true);

                }
                else {
                    $nextButton.attr("disabled", true);
                }

            });

            /**
             * Previous Button Click
             */
            $prevButton.on('click', function (e) {
                e.preventDefault();

                if (currentIndex > 0) {

                    prevPostIndex = currentIndex--;

                    $prevButton.attr("disabled", false);
                    $nextButton.attr("disabled", false);

                    $ajaxModalTitle.html(postsArray[currentIndex].title.rendered).animateFadeIn();
                    $ajaxModalContent.html(postsArray[currentIndex].content.rendered).animateFadeIn();

                }
                else {
                    $prevButton.attr("disabled", true);
                    $prevButton.animateFadeOut();
                }

            });

        }).fail(function () {
            alert("🌵 Failed to load Google Maps script 🤷 💣💣💣️");
        });

    }

})(jQuery);