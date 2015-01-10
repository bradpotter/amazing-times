<?php
/**
 * This file adds the Home Page to the Amazing Times Theme.
 *
 * @author Brad Potter
 * @package Amazing Times
 * @subpackage Customizations
 */

add_action( 'genesis_meta', 'amazingtimes_home_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function amazingtimes_home_meta() {

	if ( is_active_sidebar( 'home-featured-full' ) || is_active_sidebar( 'home-top-full' ) || is_active_sidebar( 'home-middle-full' ) || is_active_sidebar( 'home-bottom-full' ) ) {

		//* Force full-width-content layout setting
		//* add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );
		
		//* Remove breadcrumbs
		//* remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home featured area
		add_action( 'genesis_loop', 'amazingtimes_home_featured', 1 );
		
		//* Add home widget areas
		add_action( 'genesis_loop', 'amazingtimes_home_widgets', 1 );

	}
}

function amazingtimes_body_class( $classes ) {

		$classes[] = 'amazingtimes-home';
		return $classes;
		
}

function amazingtimes_home_featured() {

	if ( is_active_sidebar( 'home-featured-full' ) ) {

	echo '<div class="home-featured">';

	genesis_widget_area( 'home-featured-full', array(
		'before' => '<div class="home-featured-full widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	echo '</div>';
		
	}

}

function amazingtimes_home_widgets() {

	if ( is_active_sidebar( 'home-top-full' ) || is_active_sidebar( 'home-middle-full' ) || is_active_sidebar( 'home-bottom-full' ) ) {

	echo '<div class="home-top">';

	genesis_widget_area( 'home-top-full', array(
		'before' => '<div class="home-top-full widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	echo '</div>';

	echo '<div class="home-middle">';

	genesis_widget_area( 'home-middle-full', array(
		'before' => '<div class="home-middle-full widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	echo '</div>';

	echo '<div class="home-bottom">';

	genesis_widget_area( 'home-bottom-full', array(
		'before' => '<div class="home-bottom-full widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	echo '</div>';
		
	}

}

genesis();
