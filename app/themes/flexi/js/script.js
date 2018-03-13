(function ($) {


    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://www.eventbriteapi.com/v3/events/44132343026/?token=LUOLSEOYZJL4GV3QCJD3",
        "method": "GET",
        "headers": {}
    }

    $.ajax(settings).done(function (data) {
        console.log(data);
        var content = "<h2>" + data.name.text + "</h2>" + data.description.html;
        $("#eventbrite").append(content);
    });


    /**
     * Calendar fullcalendar.io
     */
    if ($('#calendar').length) {
        var eventsArray = [];
        var posts = flexi_vars.posts;

        $.each(posts, function (index, value) {
            var postDate = value.post_date.split(" ")[0];
            eventsArray.push({
                title: value.post_title,
                start: postDate
            });
        });

        $('#calendar').fullCalendar({
            defaultView: 'month',
            events: eventsArray
        });
    }


})(jQuery);