<?php
/**
 * Template Name: Testing
 */

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php

			$html = CFS()->get( 'test_field' );

			// array of allowed html tags for WP KSES
			$allowed_tags = array(
				'strong' => array(),
				'h1'     => array(),
				'a'      => array(
					'href'  => array(),
					'title' => array()
				)
			);

			?>

            <h1>Output a CFS field</h1>
            <pre>
                $html = CFS()->get( 'test_field' );
            </pre>

            <h1>wp_kses</h1>
            <pre>
                $allowed_tags = array(
                    'strong' => array(),
                    'h1'     => array(),
                    'a'      => array(
                        'href'  => array(),
                        'title' => array()
                    )
                );

                echo wp_kses( $html, $allowed_tags );
            </pre>

            <h2>Output</h2>
            <hr>
			<?= wp_kses( $html, $allowed_tags ); ?>

            <br><br>

            <h1>wp_kses_post</h1>
            <pre>
                echo wp_kses_post( $html );
            </pre>

            <h2>Output</h2>
            <hr>
			<?= wp_kses_post( $html ); ?>

            <br><br>

            <h1>esc_html</h1>
            <pre>
                echo esc_html( $html );
            </pre>

            <h2>Output</h2>
            <hr>
			<?= esc_html( $html ); ?>

			<?php
            // echo $html;
            ?>

		<?php endwhile; ?>

    </main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
