<?php
/**
 * This file adds the Landing Page template to Amazing Times.
 *
 * @author Brad Potter
 * @package Amazing Times
 * @subpackage Customizations
 */

/*
Template Name: Landing Page - Header/Footer
*/

//* Add custom body class to the head
add_filter( 'body_class', 'amazing_times_add_body_class' );
function amazing_times_add_body_class( $classes ) {

   $classes[] = 'amazing-times-landing';
   return $classes;
   
}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove navigation
remove_action( 'genesis_before_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action('genesis_before_footer', 'amazingtimes_tertiary_menu', 10);

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'amazingtimes_sub_footer', 5 );

//* Run the Genesis loop
genesis();
