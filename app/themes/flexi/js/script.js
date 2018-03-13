(function ($) {

    /**
     * Calendar fullcalendar.io
     */
    if ($('#calendar').length) {

        var eventsArray = [];
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://www.eventbriteapi.com/v3/users/me/owned_events/?token=LUOLSEOYZJL4GV3QCJD3",
            "method": "GET",
            "headers": {}
        }

        $.ajax(settings).done(function (data) {

            var events = data.events;
            // console.log(events);

            $.each(events, function (index, event) {
                var postDate = event.start.local.split("T")[0];
                eventsArray.push({
                    title: event.name.text,
                    start: postDate,
                    description: event.description.text,
                    url: event.url
                });
                // console.log(postDate);
            });
            // console.log(eventsArray);
            $('#calendar').fullCalendar({
                defaultView: 'month',
                events: eventsArray,
                eventClick: function(event) {
                    if (event.url) {
                        window.open(event.url);
                        return false;
                    }
                },
                windowResize: function() {
                    calendarResize();
                },
                windowResizeDelay: 1000
            });
        });

        var calendarResize = function(){
            var vWidth = window.innerWidth;
            if (vWidth < 800) {
                $('#calendar').fullCalendar('changeView', 'agendaDay');
            } else {
                $('#calendar').fullCalendar('changeView', 'month');
            }
        }

    }// if ($('#calendar').length



    /**
     * Calendar fullcalendar.io
     */
    // if ($('#calendar').length) {
    //     var eventsArray = [];
    //     var posts = flexi_vars.posts;
    //
    //     $.each(posts, function (index, value) {
    //         var postDate = value.post_date.split(" ")[0];
    //         eventsArray.push({
    //             title: value.post_title,
    //             start: postDate
    //         });
    //     });
    //
    //     $('#calendar').fullCalendar({
    //         defaultView: 'month',
    //         events: eventsArray
    //     });
    // }


})(jQuery);