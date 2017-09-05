// 1
// console.log( api_vars.nonce );

// 2
// (function( $ ) {
//   $('#close-comments').on('click', function(event) {
//      event.preventDefault();
//      $.ajax({
//         method: 'post',
//         url: red_vars.ajax_url,
//         data: {
//            'action': 'red_comment_ajax',
//            'security': red_vars.comment_nonce,
//            'the_post_id': red_vars.post_id
//         }
//      }).done( function(response) {
//         alert('Success! Comments are closed for this post.');
//      });
//   });
// })( jQuery );


// 3 also make sure to have IIFE
// (function( $ ) {
//   $('#close-comments').on('click', function(event) {
//     event.preventDefault();
//     $.ajax({
//       method: 'post',
//       url: red_vars.rest_url + 'wp/v2/posts/' + red_vars.post_id,
//       data: {
//           comment_status: 'closed'
//       },
//       beforeSend: function(xhr) {
//           xhr.setRequestHeader( 'X-WP-Nonce', red_vars.wpapi_nonce );
//       }
//     }).done( function(response) {
//       console.log(response.comment_status);
//       // $('#close-comments').text('comments are closed');

//       alert('Success! Comments are closed for this post.');
//     }).fail({

//     });

//   });
// })( jQuery );







// $('body').hide();
// $('body').fadeIn(800);


// var j = jQuery.noConflict();
// j('body').hide();
// j('body').fadeIn(800);


// jQuery.noConflict();
// (function ($) {
//     $(function () {
//         $('body').hide();
//         $('body').fadeIn(800);
//     });
// })(jQuery);


/**
 * Loading content with wp rest api
 */
// (function ($) {

//     $.ajax({
//         type: 'GET',
//         dataType: 'json',
//         url: 'http://fourth.academy.red/wp-json/wp/v2/posts',
//     }).done(function (data) {
//         console.log(data);
//         $.each(data, function (key, value) {
//             //console.log(key + ": " + value.title.rendered);

//             $('.site-header').append(
//                 '<h2>' + value.title.rendered + '</h2>' +
//                 '<p>' + value.excerpt.rendered + '</p>' +
//                 '<a href="' + value._links.self[0].href + '">' + value._links.self[0].href + '</a>' +
//                 '<br><br>'
//             );


//         });
//     }).fail({});

// })(jQuery);


/**
 * Close Comments Ajax
 *
 */
// (function ($) {
//
//     $('#close-comments').on('click', function (event) {
//         event.preventDefault();
//         $.ajax({
//             method: 'post',
//             url: api_vars.ajax_url,
//             data: {
//                 'action': 'minim_comment_ajax',
//                 'security': api_vars.comment_nonce,
//                 'the_post_id': api_vars.post_id
//             }
//         }).done(function (response) {
//             alert('Success! Comments are closed for this post.');
//         });
//     });
//
// })(jQuery);