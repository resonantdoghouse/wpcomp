<?php
/**
 * The Front Page (aka the static homepage for the site).
 *
 * @package Inhabitent_Theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="home-hero">
                <img src="<?php echo get_template_directory_uri() . '/images/redstar-logo-full.svg' ?>" class="logo"
                     alt="Inhabitent full logo"/>
            </section>

            <section class="product-info container">
                <h2>Shop Stuff</h2>
				<?php
				$terms = get_terms( array(
					'taxonomy'   => 'product-type',
					'hide_empty' => 0,
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
					?>
                    <div class="product-type-blocks">
						<?php foreach ( $terms as $term ) :
                            ?>
                            <div class="product-type-block-wrapper">
                                <img src="<?php echo get_template_directory_uri() . '/images/' . $term->slug; ?>.svg"
                                     alt="<?php echo $term->name; ?>"/>
                                <p><?php echo $term->description; ?></p>
                                <p><a href="<?php echo get_term_link( $term ); ?>"
                                      class="btn"><?php echo $term->name; ?> Stuff</a></p>
                            </div>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
            </section>

            <section class="latest-entries">
                <div class="container">
					<?php
					$news_posts = redstar_get_latest_posts( 'post', 3 );
					if ( ! empty( $news_posts ) ) :
						?>
                        <h2>Inhabitent Journal</h2>
                        <ul>
							<?php foreach ( $news_posts as $post ) : setup_postdata( $post ); ?>
                                <li>
									<?php if ( has_post_thumbnail() ) : ?>
                                        <div class="thumbnail-wrapper">
											<?php the_post_thumbnail( 'large' ); ?>
                                        </div>
									<?php endif; ?>
                                    <div class="post-info-wrapper">
                                        <span class="entry-meta"><?php redstar_posted_on(); ?>
                                            / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
										<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                    </div>
                                    <a class="black-btn" href="<?php the_permalink(); ?>">Read Entry</a>
                                </li>
							<?php endforeach;
							wp_reset_postdata(); ?>
                        </ul>
					<?php endif; ?>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>