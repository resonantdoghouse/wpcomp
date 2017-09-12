<?php

get_header();


foreach ( get_the_terms( get_the_ID(), 'bass-type' ) as $term ) {
	echo $term->name;
	echo $term->slug;
//	ddd($term);
}


while ( have_posts() ) : the_post();

	the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

	the_content();

	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}

endwhile;


get_footer(); ?>
