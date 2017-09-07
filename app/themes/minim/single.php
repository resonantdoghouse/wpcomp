<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

            <div class="owl-carousel">
				<?php

				$images  = get_post_meta( get_the_ID(), 'custom_upload_media', false );
				$uploads = wp_upload_dir();

				foreach ( $images as $image ) {
					$filename = basename( get_attached_file( $image ) );
					echo '<div><img src="' . esc_url( $uploads['baseurl'] . '/' . $filename ) . '"></div>';
				}
				?>
            </div>

			<?php
			$field_one = get_post_meta( get_the_ID(), 'field_one', false );

			foreach ( $field_one as $field ) {
				echo '<p>';
				echo $field;
				echo '</p>';
			}

			$field_two = get_post_meta( get_the_ID(), 'field_two', true );
			?>

            <div style="background: <?php echo $field_two; ?>; width: 50px; height: 50px; border-radius: 100%;"></div>

			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
					               '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
					               '<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
					               '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
					               '<span class="post-title">%title</span>',
				) );
			}

		endwhile;
		?>

    </main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
