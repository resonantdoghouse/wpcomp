<?php
/**
 * Template File for the url set e.g. /wp/testing/
 */
get_header();

/**
 * WP_Query
 * https://codex.wordpress.org/Class_Reference/WP_Query
 */
$args = array(
	'post_type' => 'bass',
	'tax_query' => array(
		array(
			'taxonomy' => 'bass-type',
			'field'    => 'slug',
			'terms'    => 'fender',
		),
	),
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>

<h2><?= __( 'Posts', 'dev-ajax' ); ?></h2>
<ul>

	<?php while ( $the_query->have_posts() ) :
		$the_query->the_post();

		?>

        <li>
            <a class="dev-ajax-post__link" href="<?= get_the_permalink(); ?>" id="<?= get_the_ID(); ?>">
				<?= get_the_title(); ?>

            </a>
        </li>

	<?php endwhile; ?>

	<?php

	wp_reset_postdata();

	endif;

	get_footer();
	?>
