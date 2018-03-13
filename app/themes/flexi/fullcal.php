<?php
/**
 * Template Name: FullCal
 *
 * @package flexi
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <select name="filter-select"> <!--Supplement an id here instead of using 'text'-->
                <option value="filter1">Filter 1</option>
                <option value="filter2" selected>Filter 2</option>
                <option value="filter3">Filter 3</option>
            </select>
            <div id="calendar"></div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();