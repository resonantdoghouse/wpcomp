(function ($) {

    var postUrl = 'http://localhost/wpcomp/wp/wp-json/wp/v2/basses?_embed',
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
        $modalWindow = '' +

            // modal container
            '<div class="dev-ajax__modal--wrapper">' +

            // close modal
            '<button class="dev-ajax__modal--close">Close</button>' +

            // nav
            '<nav>' +
            '<button class="dev-ajax__modal__button--prev">Prev</button>' +
            '<button class="dev-ajax__modal__button--next">Next</button>' +
            '</nav>' +

            // content
            '<div class="dev-ajax__modal--content">' +

            '<h1 class="dev-ajax__modal--content__title">{{title}}</h1>' +

            '<div class="dev-ajax__modal--content__post"></div>' +

            '</div>' +


            '</div>'; // modal container
    alert('hamboe');

    /**
     * Click: open Modal & init Ajax request
     */
    $('.dev-ajax-post__link').on('click', function (e) {
        e.preventDefault();
        postId = $(this).attr('id');
        modalPostContent();
    });

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

            $ajaxModalContent = $('.dev-ajax__modal--content');
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

            $ajaxModalTitle.html(postsArray[currentIndex].title.rendered).show();
            $ajaxModalContent.html(postsArray[currentIndex].content.rendered).show();

            $ajaxModalWrapper.fadeIn(500);

            /**
             * Click Events
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

                if (currentIndex === (postsArray.length - 1)) {
                    $nextButton.attr("disabled", true);
                }
                else if (currentIndex < (postsArray.length - 1)) {
                    nextPostIndex = currentIndex++;

                    $nextButton.attr("disabled", false);
                    $prevButton.attr("disabled", false);

                    $ajaxModalTitle.html(postsArray[currentIndex].title.rendered);
                    $ajaxModalContent.html(postsArray[currentIndex].content.rendered);


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

                    $ajaxModalTitle.html(postsArray[currentIndex].title.rendered).show();
                    $ajaxModalContent.html(postsArray[currentIndex].content.rendered).show();

                }
                else {
                    $prevButton.attr("disabled", true);
                }

            });

        }).fail(function () {
            alert("🌵 Failed to load Google Maps script 🤷 💣💣💣️");
        });

    }

})(jQuery);