<?php
/**
 * Represents a meta box to be displayed within the 'Add New Post' page.
 */

/**
 * Represents a meta box to be displayed within the 'Add New Post' page.
 *
 * The class maintains a reference to a display object responsible for
 * displaying whatever content is rendered within the display.
 */
class Meta_Box {

	/**
	 * A reference to the Meta Box Display.
	 *
	 * @access private
	 * @var    Meta_Box_Display
	 */
	private $display;

	/**
	 * Initializes this class by setting its display property equal to that of
	 * the incoming object.
	 *
	 * @param Meta_Box_Display $display Displays the contents of this meta box.
	 */
	public function __construct( $display ) {
		$this->display = $display;
	}

	/**
	 * Registers this meta box with WordPress.
	 *
	 * Defines a meta box that will render inspirational questions at the top
	 * of the sidebar of the 'Add New Post' page in order to help prompt
	 * bloggers with something to write about when they begin drafting a post.
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			// create ACF options page
			$args = array(
				'page_title' => 'JB Bootstrap',
				'icon_url'   => 'dashicons-admin-settings'
			);
			acf_add_options_page( $args );
		}
	}
}