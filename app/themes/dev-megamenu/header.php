<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <div class="site-inner">
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

        <header id="masthead" class="site-header" role="banner">
            <div class="site-header-main">
                <div class="site-branding">
					<?php twentysixteen_the_custom_logo(); ?>

					<?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                                  rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                                 rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
                </div><!-- .site-branding -->



















                <!-- NAV BAR -->
                <div class="primary-menu__wrapper">
                    <div class="primary-menu">
                        <nav class="nav" role="navigation">
                            <ul>
								<?php $locations = get_nav_menu_locations();

								// if there's a location for the primary menu
								if ( isset( $locations['dev-megamenu'] ) ) {
									$menu = get_term( $locations['dev-megamenu'], 'nav_menu' );

									// if there are items in the primary menu
									if ( $items = wp_get_nav_menu_items( $menu->name ) ) {

										// loop through all menu items to display their content
										foreach ( $items as $item ) {

											// if the current item is not a top level item, skip it
											if ( $item->menu_item_parent != 0 ) {
												continue;
											}

											// get the ID of the current nav item
											$curNavItemID = $item->ID;

											// get the custom classes for the item
											// (determined within the WordPress Appearance > Menu section)
											$classList = implode( " ", $item->classes );
											echo "<li class=\"{$classList}\">";
											echo "<a href=\"{$item->url}\">{$item->title}</a>";

											// build the mega-menu
											// if 'mega-menu'  exists within the class
											if ( in_array( 'has-mega-menu', $item->classes ) ) { ?>
                                                <div class="mega-menu__wrapper js-mega-menu">
                                                    <div class="mega-menu">

                                                        <div class="mega-menu__content">
                                                            <h2><?= $item->post_title; ?></h2>
                                                            <p><?= $item->description; ?></p>
                                                            <a href="<?= $item->url; ?>" class="learn-more">Learn
                                                                More</a>
                                                        </div>

                                                        <div class="mega-menu__subnav">
                                                            <nav>
                                                                <ul class="subnav">
																	<?php // cycle through the menu items and get the subnav
																	foreach ( $items as $subnav ) {
																		if ( $subnav->menu_item_parent == $curNavItemID ) {
																			echo "<li><a href=\"{$subnav->url}\">{$subnav->title}</a>";
																		}
																	} ?>
                                                                </ul>
                                                            </nav>
                                                        </div>


                                                    </div>
                                                </div>
											<?php }

											// if this is the search bar
											if ( in_array( 'nav-search', $item->classes ) ) { ?>
                                                <div class="search-bar__wrapper">
                                                    <div class="search-bar">
                                                        <div class="search-bar__form">
                                                            <form>
                                                                <input type="text" name="s" placeholder="Keywords"/>
                                                                <button type="button" role="submit" name="Search">
                                                                    Search
                                                                </button>
                                                            </form>
                                                            <a href="#" class="js-close-search search-bar__close">
                                                                <svg role="img" class="icon">
                                                                    <use xlink:href="<?php bloginfo( 'template_url' ); ?>/assets/dist/img/svg.svg#close"></use>
                                                                </svg>
                                                            </a>
                                                        </div> <!-- /.search-bar__form -->
                                                    </div><!-- /.search-bar -->
                                                </div><!-- /.search-bar__wrapper -->
											<?php }
											echo '</li>';

										}
									}
								} ?>
                            </ul>
							<?php //nationsu_primary_nav(); ?>
                        </nav>
                    </div><!-- /.primary-menu -->
                </div> <!-- /.primary-menu__wrapper -->























				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                    <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

                    <div id="site-header-menu" class="site-header-menu">

						<?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <nav id="site-navigation" class="main-navigation" role="navigation"
                                 aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class'     => 'primary-menu',
								) );
								?>
                            </nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ) : ?>
                            <nav id="social-navigation" class="social-navigation" role="navigation"
                                 aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
								?>
                            </nav><!-- .social-navigation -->
						<?php endif; ?>
                    </div><!-- .site-header-menu -->
				<?php endif; ?>
            </div><!-- .site-header-main -->

			<?php if ( get_header_image() ) : ?>
				<?php
				/**
				 * Filter the default twentysixteen custom header sizes attribute.
				 *
				 * @since Twenty Sixteen 1.0
				 *
				 * @param string $custom_header_sizes sizes attribute
				 * for Custom Header. Default '(max-width: 709px) 85vw,
				 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
				 */
				$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
                <div class="header-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>"
                             srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>"
                             sizes="<?php echo esc_attr( $custom_header_sizes ); ?>"
                             width="<?php echo esc_attr( get_custom_header()->width ); ?>"
                             height="<?php echo esc_attr( get_custom_header()->height ); ?>"
                             alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    </a>
                </div><!-- .header-image -->
			<?php endif; // End header image check. ?>
        </header><!-- .site-header -->

        <div id="content" class="site-content">
