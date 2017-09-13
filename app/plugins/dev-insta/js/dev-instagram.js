(function ($) {

    // https://github.com/adrianengine/jquery-spectragram/wiki/How-to-get-Instagram-API-access-token-and-fix-your-broken-feed

    var spectagramComplete = function () {

        $(window).on("load", function () {
            createCarousel();
        });

    };

    var createCarousel = function () {

        $('.owl-carousel').owlCarousel({
            stagePadding: 10,
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

    };

    var Spectra = {
        instaToken: '6002595788.3d028a4.6d92b5d296244275b46f6a37387c246b',
        instaID: ' 3d028a41022f4a86ab986b3f2abd70bc',

        init: function () {
            $.fn.spectragram.accessData = {
                accessToken: this.instaToken,
                clientID: this.instaID
            };

            $('.site-header').append('<div class="owl-carousel"></div>');

            $('.owl-carousel').spectragram('getUserFeed', {
                max: 12,
                query: 'buildcreativewebsites',
                size: 'big',
                wrapEachWith: '<div class="item"></div>',
                complete: spectagramComplete()
            });


        }
    };

    Spectra.init();

})(jQuery);