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

            $.each(events, function (index, event) {
                var postDate = event.start.local.split("T")[0];
                var imgUrl = '';
                var evtDesc = '';

                if (event.logo !== null){
                    imgUrl = event.logo.original.url;
                }

                if(event.description !== null){
                    evtDesc = event.description.text;
                }

                eventsArray.push({
                    title: event.name.text,
                    start: postDate,
                    description: evtDesc,
                    url: event.url,
                    imageurl: imgUrl
                });
            });

            $('#calendar').fullCalendar({
                defaultView: 'month',
                events: eventsArray,
                eventClick: function(event) {

                    if (event.url) {
                        // window.open(event.url);
                        console.log(event);

                        var tbContent = '';
                            tbContent += event.description;
                            tbContent += '<img src="' + event.imageurl + '"/>';

                        var tbUrl = "#TB_inline?&width=400&height=300";
                        tb_show(event.title, tbUrl);

                        $('#TB_ajaxContent').html(tbContent);

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

        $('#filter-calendar').on('change', function(){
            if($(this).val() === 'month-view'){
                $('#calendar').fullCalendar('changeView', 'month');
            }
            else if($(this).val() === 'agenda-day') {
                $('#calendar').fullCalendar('changeView', 'agendaDay');
            }
        });

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