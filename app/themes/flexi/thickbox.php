<?php
/**
 * Template Name: Thickbox
 *
 * @package flexi
 */

get_header();
add_thickbox();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>


			<div id="acme-thickbox-demo" class="wrap">

				<h1>Acme Thickbox Demo</h1>
				<p>Provides an exmaple of how to use the thickbox library within a WordPress plugin page.</p>

				<div id="acme-thickbox-content">
					<a href="TB_inline?width=600&height=550&inlineId=acme-modal-dialog" class="thickbox">Display The Dialog</a>
					<div id="acme-modal-dialog" style="display:none;">
						<h2>Hello World</h2>
						<p>Lucas ipsum dolor sit amet ventress dak jusik chewbacca tenel beru bail anomid hapes mas.</p>
						<p>Fel kalee kyle desann. Ozzel p'w'eck jax castell saleucami. Thisspias veila mantell mccool garindan jax.</p>
						<p>Barriss kurtzen sing bertroff cody frozarns. Han koon miraluka vau.</p>
						<p>
						<ul>
							<li>Bajic asajj boba raymus dug piell moddell jax darth.</li>
							<li>Sio anakin naberrie shistavanen fisto utapau chewbacca aayla.</li>
						</ul>
						</p>
						<p>
							Corran axmis kor-uj hutt marek kenobi ansuroer echani. Mirax mara fisto bith tyranus kashyyyk farlander max b'omarr.
							Ben dodonna askajian teevan palpatine lobot beru.
						</p>
					</div><!-- #acme-modal-dialog -->
				</div><!-- #acme-thickbox-content -->

			</div><!-- #acme-thickbox-demo -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();