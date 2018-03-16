<?php
/**
 * Template Name: People
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<?php

//		$taxonomy_name = 'role';
//
//		$parent_cat_ID = 0;
//		$args          = array(
//			'hierarchical'     => 1,
//			'show_option_none' => '',
//			'hide_empty'       => 0,
//			'parent'           => $parent_cat_ID,
//			'taxonomy'         => $taxonomy_name
//		);
//
//		$subcats = get_terms( $args );
//
//		foreach ( $subcats as $sc ) :
////			d($sc);
//			$terms = get_terms(
//				$taxonomy_name,
//				array(
//					'parent'     => $sc->term_id,
//					'orderby'    => 'slug',
//					'hide_empty' => false
//				) );
//
//			foreach ( $terms as $term ) :
//				d( $term );
////				d( $sc );
//				echo get_the_title();
//				echo '<div class="single_cat col-md-3">';
//				echo '<h3>' . $sc->name . '</h3>';
//				echo "<ul>";
//				echo '<li><a href="' . get_term_link( $term->name, $taxonomy_name ) . '">' . $term->name . '</a></li>';
//				echo "</ul>";
//				echo '</div>';
//			endforeach;
//
//		endforeach;
//
//		$args = array(
//			'post_type' => 'person',
////			'tax_query' => array(
////				'relation' => 'AND',
////				array(
////					'taxonomy' => 'role',
////					'field'    => 'slug',
////					'terms'    => array('actor'),
////				),
//////				array(
//////					'taxonomy' => 'actor',
//////					'field'    => 'term_id',
//////					'terms'    => array( 103, 115, 206 ),
//////					'operator' => 'NOT IN',
//////				),
////			),
//		);
//
//		$the_query = new WP_Query( $args );
//
//		if ( $the_query->have_posts() ) {
//			echo '<ul>';
//			while ( $the_query->have_posts() ) :
//				$the_query->the_post();
//				echo '<li>' . get_the_title();
//				echo '</li>';
//
//				$id = get_the_ID();
//				d($id);
//				d(wp_get_post_categories($id));
//				$cats = wp_get_post_categories($id);
//                echo $cats[0]->name;
//
//				echo $category_name;
//
//			endwhile;
//			echo '</ul>';
//			/* Restore original Post Data */
//			wp_reset_postdata();
//
//		} else {
//			// no posts found
//		}

		//		$category = get_term_by( 'name', 'actor', 'role' );
		//		echo $category->term_id;
		//		d($category);









		/**
		 * Bacon
		 */
//		$args = [
//			'post_type' => 'person',
//			'tax_query' => [
//				[
//					'taxonomy' => 'role',
//                    'field' => 'slug',
//					'terms' => 'actor', // actor
//					'include_children' => true // Remove if you need posts from term child terms
//				],
//			],
//		];
//
//		$myposts = get_posts( $args );
//
//		d($myposts);
//
//		foreach ( $myposts as $post ) : setup_postdata( $post );
////            d($post->ID);
//
//			$id = $post->ID;
////			d(wp_get_post_categories( $id ));
//
//			d(get_the_category_list( ',', 11, $id ));
//
//		    $link = get_the_permalink();
//		    $link_desc = get_the_title();
//            echo "<li><a href=\"{$link}\">{$link_desc}</a></li>";
//
//		endforeach;
//
//		wp_reset_postdata();

































		$terms = get_terms( array(
			'taxonomy' => 'role', //Default category
			'hide_empty' => false,
		) );

//		d($terms);

		echo "<ul>";

		foreach ($terms as $term) {
			$parent = $term->parent;
			if ( $parent == '0' ) {
				/* Parent category */
				echo '<li>' . $term->name . '</li>';

//				d($term->term_id);
				/* Child category */
				$childrens = get_categories( array ('parent' => $term->term_id ));

				d($childrens);

				echo "<ul>";

				foreach($childrens as $children) :
					$args = array(
						'post_type' => 'person',
						'tax_query' => array(
							array(
								'taxonomy' => 'category', //Default category
								'field'    => 'slug',
								'terms'    => $children->slug,
							),
						),
					);
					echo '<li>' . $children->name . '</li>';
					/*  Child category posts */
					?>
                    <ul>
						<?
						$loop1 = new wp_Query($args);
						while($loop1->have_posts()) : $loop1->the_post();
							the_title( '<h6>', '</h6>' );
						endwhile;
						wp_reset_query();
						?>
                    </ul>

				<?php
				endforeach;
				echo "</ul>";

				/*  Parent category posts */
				if (empty($childrens)) {
					?>
                    <ul>
						<?
						$args = array(
							'post_type' => 'person',
							'tax_query' => array(
								array(
									'taxonomy' => 'role',
									'field'    => 'slug',
									'terms'    => $term->slug,
								),
							),
						);
						$loop = new wp_Query($args);
						while($loop->have_posts()) : $loop->the_post();
							the_title( '<h6>', '</h6>' );
						endwhile;
						wp_reset_query();

						?>

                    </ul>

                    <?php
				}
			}
		}

		echo "</ul>";




		?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
