<?php
/**
 * The template for displaying the "product" post type archive pages.
 *
 * @package RedStar_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

						<?php
						$terms = get_terms( array(
							'taxonomy' => 'product-type',
							'hide_empty' => 0,
						) );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
							?>
							<ul class="product-type-list">
								<?php foreach ( $terms as $term ) : ?>
									<li>
										<p><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></p>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</header><!-- .page-header -->

					<div class="product-grid">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<div class="product-grid-item">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="thumbnail-wrapper">
										<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail( 'large' ); ?></a>
									</div>
								<?php endif; ?>

								<div class="product-info">
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
									<span class="price"><?php echo esc_html( CFS()->get( 'price' ) ); ?></span>
								</div>
							</div>

						<?php endwhile; ?>
					</div>

					<?php redstar_numbered_pagination(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>