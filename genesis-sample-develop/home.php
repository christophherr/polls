<?php
/**
 * Home.php
 *
 * This file adds functions to the Genesis Sample Theme Posts Page.
 *
 * @package Genesis Sample
 * @author  Christoph Herr
 * @license GPL-2.0+
 * @link	http://www.studiopress.com/
 */

// Force full width content.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action( 'genesis_before_loop', 'ch_opening_div' );
/**
 * Add opening tag for the div wrapping the entries.
 *
 * @return void
 */
function ch_opening_div() {
	echo '<div id="grid" data-columns>';
}

add_action( 'genesis_after_loop', 'ch_closing_div' );
/**
 * Add closing tag for the div wrapping the entries.
 *
 * @return void
 */
function ch_closing_div() {
	echo '</div>';
}

add_action( 'genesis_before_entry', 'ch_entry_opening' );
/**
 * Add opening tag for each entry.
 *
 * @return void
 */
function ch_entry_opening() {
	echo '<div>';
}

add_action( 'genesis_after_entry', 'ch_entry_closing' );
/**
 * Add closing tag for each entry.
 *
 * @return void
 */
function ch_entry_closing() {
	echo '</div>';
}

// Remove the post image from theme settings.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

// Remove entry footer.
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

// Reposition Archive Pagination.
// Moves .archive-pagination from under main.content to adjacent to it.
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
add_action( 'genesis_after_content', 'genesis_posts_nav' );

wp_enqueue_script( 'salvattore', get_stylesheet_directory_uri() . '/js/salvattore.min.js', '', '1.0.9', true );

genesis();
