(function ($) {

    const $tokenInput = $('#dev-evtbr-import-token');
    // array of eventbrite events
    let eventsArray = [];
    // array of events in wordpress
    let wpEventsArray = [];

    /**
     * Load events after input of api token for auth
     */
    $('#dev-evtbr-import-events').on('click', function () {

        let token = $tokenInput.val();
        let eventBriteSettings = {
            "async": true,
            "crossDomain": true,
            "url": "https://www.eventbriteapi.com/v3/users/me/owned_events/?token=" + token,
            "method": "GET",
            "headers": {}
        }

        /**
         * Check if token has value if so send ajax request
         */
        if (token.length > 6) {
            /**
             * Get Eventbrite events
             */
            $.ajax(eventBriteSettings).done(function (data) {

                let events = data.events;

                $.each(events, function (index, event) {

                    // console.log(event);

                    let startDate = event.start.local.split("T")[0];
                    let endDate = event.end.local.split("T")[0];
                    let imgUrl = '';
                    let evtDesc = '';
                    let htmlTemplate;

                    if (event.logo !== null) {
                        imgUrl = event.logo.original.url;
                    }

                    if (event.description !== null) {
                        evtDesc = event.description.text;
                    }

                    eventsArray.push({
                        title: event.name.text,
                        start: startDate,
                        end: endDate,
                        description: evtDesc,
                        url: event.url,
                        imageurl: imgUrl
                    });

                    htmlTemplate = `
                        <div class="dev-evtbr-preview dev-evtbr-fadein"> 
                        
                        <h2><small>title:</small> ${event.name.text}</h2>
                        
                        <p><small>description:</small> ${evtDesc}</p>
                        <img src="${imgUrl}" alt="">
                        <p><small>start date:</small> <time>${startDate}</time></p>
                        <p><small>end date:</small> <time>${endDate}</time></p>
                        </div>
                    `;

                    $('#dev-evtbr-appended-events').append(htmlTemplate);

                });// .each

                $('#dev-evtbr-import-events').attr('disabled', 'disabled');
                $('#dev-evtbr-appended-events').before(`
                    <p id="dev-evtbr-preview-msg" class="dev-evtbr-fadein">
                        <small>event import preview</small>
                    </p>
                `);

            });// .ajax

            // callback after loading data from eventbrite
            loadWpEvents();

            // append import button
            if (!$('#dev-evtbr-import-events-to-wp').length) {
                $('#dev-evtbr-import-events').after(`
                    <button id="dev-evtbr-import-events-to-wp" 
                            class="dev-evtbr-import-events-to-wp dev-evtbr-fadein">
                            Import Events to WordPress
                    </button>
                `);
            }

            // Events Import button click
            $('#dev-evtbr-import-events-to-wp').on('click', function () {

                let eventData = {};
                // console.log(eventsArray);
                $.each(eventsArray, function (index, value) {

                    eventData.title = value.title;
                    eventData.content = value.description;
                    eventData.start_date = value.start;
                    eventData.end_date = value.end;
                    eventData.slug = value.title.replace(/ /g, '-');

                    if (wpEventsArray.indexOf(eventData.slug) == -1) {
                        console.log('slug not found, creating new post');
                        postEvent(eventData);
                    } else {
                        console.log('slug found, not creating new post');
                    }

                });

                /**
                 * Post Events from eventbrite to WP Events Calendar
                 * @param eventData
                 */
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
                    });
                }

                // let confViewEvents = confirm('Events Imported, would you like to go to view the event listings?');
                //
                // if (confViewEvents) {
                //     window.location = "edit.php?post_type=tribe_events";
                // }
                $('#dev-evtbr-import-events-to-wp').attr('disabled', 'disabled');
                $('#dev-evtbr-appended-events').fadeOut(500);
                $('#dev-evtbr-preview-msg').hide();
                $('#dev-evtbr-appended-events').before('<h3 class="dev-evtbr-fadein">Events posted</h3>');

            });

            function loadWpEvents() {
                let wpDataSettings = {
                    "async": true,
                    "url": dev_evtbr.rest_url + 'tribe/events/v1/events',
                    "method": "GET"
                }

                $.ajax(wpDataSettings).done(function (data) {
                    let wpEvents = data.events;

                    $.each(wpEvents, function (index, value) {
                        wpEventsArray.push(
                            value.slug
                        );
                    });

                    // console.log($.inArray('', wpEventsArray));

                }).fail(function (err) {
                    console.log(err);
                });

                console.log(wpEventsArray);
            }

        }// token.length
    });// #dev-evtbr-import-events on click

})(jQuery);