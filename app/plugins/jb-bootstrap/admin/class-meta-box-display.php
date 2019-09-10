<?php
/**
 * Defines the functionality required to render the content within the Meta Box
 * to which this display belongs.
 *
 * When the render method is called, the contents of the string it includes
 * or the file it includes to render within the meta box.
 */
class Meta_Box_Display {

	/**
	 * Renders a single string in the context of the meta box to which this
	 * Display belongs.
	 */
	public function render() {

		echo 'This is the meta box.';
	}
}