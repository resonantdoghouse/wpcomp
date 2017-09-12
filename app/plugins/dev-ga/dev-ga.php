<?php
/**
 * Plugin Name: Dev GA
 * Text Domain: dev-ga
 * Description: Google Analytics Plugin
 * Version: 1.0.1
 *
 */

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

add_action( 'wp_head', 'dev_ga_google_analytics' );

function dev_ga_google_analytics() {
	?>

    <!-- Google Analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->

<?php }



