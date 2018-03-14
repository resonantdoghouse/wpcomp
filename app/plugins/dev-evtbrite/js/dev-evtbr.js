(function ($) {

    /**
     *
     * @type {*|HTMLElement}
     */
    var $tokenInput = $('#dev-evtbr-import-token');
    var eventsArray = [];

    $('#dev-evtbr-import-events').on('click', function () {

        var token = $tokenInput.val();
        var ajaxSettings = {
            "async": true,
            "crossDomain": true,
            "url": "https://www.eventbriteapi.com/v3/users/me/owned_events/?token=" + token,
            "method": "GET",
            "headers": {}
        }

        /**
         * Check if token has value if so send ajax request
         */
        if (token.length > 1) {

            $.ajax(ajaxSettings).done(function (data) {

                var events = data.events;

                $.each(events, function (index, event) {
                    // console.log(event);
                    var postDate = event.start.local.split("T")[0];
                    var imgUrl = '';
                    var evtDesc = '';
                    var htmlTemplate = '';

                    if (event.logo !== null) {
                        imgUrl = event.logo.original.url;
                    }

                    if (event.description !== null) {
                        evtDesc = event.description.text;
                    }

                    eventsArray.push({
                        title: event.name.text,
                        start: postDate,
                        description: evtDesc,
                        url: event.url,
                        imageurl: imgUrl
                    });

                    htmlTemplate += '<h2>' + event.name.text + '</h2>';
                    htmlTemplate += '<p>' + evtDesc + '</p>';
                    htmlTemplate += '<img src="' + imgUrl + '"</>';

                    $('#dev-evtbr-appended-events').append(htmlTemplate);

                });// .each
            });// .ajax

            $('#dev-evtbr-import-events').after('<button id="dev-evtbr-import-events-to-wp">Import Events to WordPress</button>');

            /**
             * Event Import
             */
            $('#dev-evtbr-import-events-to-wp').on('click', function () {

                var eventData = {};
                console.log(eventsArray);
                $.each(eventsArray, function (index, value) {

                    eventData.title = value.title;
                    eventData.content = value.description;
                    eventData.start_date = value.start;
                    eventData.end_date = value.start;
                    console.log(eventData);

                    postEvent(eventData);
                });

                // console.log(eventsArray);

                function postEvent(eventData) {
                    $.ajax({
                        method: 'post',
                        url: dev_evtbr.rest_url + 'tribe/events/v1/events',
                        data: eventData,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-WP-Nonce', dev_evtbr.nonce);
                        }
                    }).done(function (response) {
                        // console.log(response);
                        $('#dev-evtbr-appended-events').empty();
                        // $('#close-comments').after('<p class="comment-status">Comments are now ' + commentStatus + ' for this post.</p>');
                    });
                }

                // alert('Events Imported');

            });


        }// token.length

    });// #dev-evtbr-import-events on click

})(jQuery);