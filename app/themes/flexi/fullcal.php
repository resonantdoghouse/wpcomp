<?php
/**
 * Template Name: FullCal
 *
 * @package flexi
 */

get_header();
add_thickbox();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <select id="filter-calendar" name="filter-calendar">
                <option value="month-view" selected>month view</option>
                <option value="agenda-day">agenda day</option>
            </select>

            <div id="calendar"></div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();