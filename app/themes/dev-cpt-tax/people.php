<?php
/**
 * Template Name: People
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<?php

		$args = array(
			'post_type' => 'person',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'role',
					'field'    => 'slug',
					'terms'    => array( 'teacher' ),
				),
//				array(
//					'taxonomy' => 'actor',
//					'field'    => 'term_id',
//					'terms'    => array( 103, 115, 206 ),
//					'operator' => 'NOT IN',
//				),
			),
		);

		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			echo '<ul>';
			while ( $the_query->have_posts() ) :
				$the_query->the_post();

//				d($post);
//				d(get_the_ID());
//				d(get_the_category( get_the_ID() ));
//
//				$category_detail=get_the_category(get_the_ID());//$post->ID
//				foreach($category_detail as $cd){
//					echo $cd->cat_name;
//				}

				$taxonomyName = 'role';

				$parent_cat_ID = 0;
				$args          = array(
					'hierarchical'     => 1,
					'show_option_none' => '',
					'hide_empty'       => 0,
					'parent'           => $parent_cat_ID,
					'taxonomy'         => $taxonomyName
				);

				$subcats = get_terms( $args );

				foreach ( $subcats as $sc ) :
//                    d(get_the_title());

					$terms = get_terms(
						$taxonomyName,
						array(
							'parent'     => $sc->term_id,
							'orderby'    => 'slug',
							'hide_empty' => false
						) );

					foreach ( $terms as $term ) :
//                        d($term);
//					    d($sc);
					    echo get_the_title();
						echo '<div class="single_cat col-md-3">';
						echo '<h3>' . $sc->name . '</h3>';
						echo "<ul>";
						echo '<li><a href="' . get_term_link( $term->name, $taxonomyName ) . '">' . $term->name . '</a></li>';
						echo "</ul>";
						echo '</div>';
					endforeach;

				endforeach;

//				echo '<li>' . get_the_title() . '</li>';
			endwhile;
			echo '</ul>';
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
		}
		?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
