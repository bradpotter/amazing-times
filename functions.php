<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Amazing Times' );
define( 'CHILD_THEME_URL', 'http://www.bradpotter.com/themes/amazing-times' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Add Color Scheme
add_action( 'after_setup_theme', 'amazingtimes_color_scheme_init' );
function amazingtimes_color_scheme_init() {

	require_once( get_stylesheet_directory() . '/color-scheme/color-scheme.php' );

}

//* Enqueue CSS files
add_action( 'wp_enqueue_scripts', 'amazingtimes_enqueue_styles' );
function amazingtimes_enqueue_styles() {

	wp_enqueue_style( 'amazingtimes-lato-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'amazingtimes-gvollkorn-fonts', '//fonts.googleapis.com/css?family=Vollkorn:400italic,700italic,400,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'amazingtimes-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'dashicons' );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add new image sizes
add_image_size( 'Slider-Large', 1120, 630, TRUE );
add_image_size( 'Featured-Medium', 720, 405, TRUE );
add_image_size( 'Featured-Small', 320, 180, TRUE );

//* Reposition the Primary Navigation Menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

// Register and display Tertiary Navigation Menu
add_action('genesis_before_footer', 'amazingtimes_tertiary_menu', 10);
	function amazingtimes_tertiary_menu() {

	register_nav_menu( 'tertiary', 'Tertiary Navigation Menu' );
	
	genesis_nav_menu( array(
		'theme_location' => 'tertiary',
		'menu_class'     => 'menu genesis-nav-menu menu-tertiary',
	) );

}

// Add Theme Support for Genesis Menus
add_theme_support( 'genesis-menus', array( 'primary'   => __( 'Primary Navigation Menu', 'genesis' ), 'secondary' => __( 'Secondary Navigation Menu', 'genesis' ), 'tertiary' => __( 'Tertiary Navigation Menu', 'genesis' ), ) );

// Add structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'menu-tertiary',
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer'
) );


//* Customize the entry meta in the entry header
add_filter( 'genesis_post_info', 'mass_media_single_post_info_filter' );
function mass_media_single_post_info_filter( $post_info ) {

	$post_info = '[post_date] [post_author_posts_link] [post_comments] [post_edit]';
	return $post_info;

}

//* Customize the entry meta in the entry footer
add_filter( 'genesis_post_meta', 'mass_media_post_meta_filter' );
function mass_media_post_meta_filter($post_meta) {

	$post_meta = '[post_categories before=""] [post_tags before=""]';
	return $post_meta;

}

//* Add after entry widget after the entry content
add_action( 'genesis_after_entry', 'amazingtimes_after_entry', 5 );
function amazingtimes_after_entry() {

	if ( is_singular( 'post' ) )
		genesis_widget_area( 'after-entry', array(
			'before' => '<div class="after-entry widget-area">',
			'after'  => '</div>',
		) );

}

//* Add the sub footer section
add_action( 'genesis_before_footer', 'amazingtimes_sub_footer', 5 );
function amazingtimes_sub_footer() {

	if ( is_active_sidebar( 'sub-footer-left' ) || is_active_sidebar( 'sub-footer-right' ) ) {
		echo '<div class="sub-footer"><div class="wrap">';
		
		   genesis_widget_area( 'sub-footer-left', array(
		       'before' => '<div class="sub-footer-left">',
		       'after'  => '</div>',
		   ) );
	
		   genesis_widget_area( 'sub-footer-right', array(
		       'before' => '<div class="sub-footer-right">',
		       'after'  => '</div>',
		   ) );
	
		echo '</div><!-- end .wrap --></div><!-- end .sub-footer -->';	
	}
	
}

add_action( 'genesis_after_header', 'amazing_times_homepage_sidebar' );
function amazing_times_homepage_sidebar() {

	if ( ! is_home() )
		return;

	remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
	add_action( 'genesis_sidebar', 'amazing_times_do_sidebar' );
}

function amazing_times_do_sidebar() {

	dynamic_sidebar( 'home-sidebar' );
}

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-sidebar',
	'name'        => __( 'Home Sidebar', 'amazingtimes' ),
	'description' => __( 'This is the homepage sidebar.', 'amazingtimes' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-featured-full',
	'name'        => __( 'Home Featured', 'amazingtimes' ),
	'description' => __( 'This is the featured section of the homepage.', 'amazingtimes' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-top-full',
	'name'        => __( 'Home Top', 'amazingtimes' ),
	'description' => __( 'This is the top section of the content area on the homepage.', 'amazingtimes' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-middle-full',
	'name'        => __( 'Home Middle', 'amazingtimes' ),
	'description' => __( 'This is the middle section of the content area on the homepage.', 'amazingtimes' ),
) )
;genesis_register_sidebar( array(
	'id'          => 'home-bottom-full',
	'name'        => __( 'Home Bottom', 'amazingtimes' ),
	'description' => __( 'This is the bottom section of the content area on the homepage.', 'amazingtimes' ),
) );
genesis_register_sidebar( array(
	'id'          => 'after-entry',
	'name'        => __( 'After Entry', 'amazingtimes' ),
	'description' => __( 'This is the after entry widget area.', 'amazingtimes' ),
) );
genesis_register_sidebar( array(
	'id'          => 'sub-footer-left',
	'name'        => __( 'Sub Footer - Left', 'amazingtimes' ),
	'description' => __( 'This is the left section of the sub footer.', 'amazingtimes' ),
) );
genesis_register_sidebar( array(
	'id'          => 'sub-footer-right',
	'name'        => __( 'Sub Footer - Right', 'amazingtimes' ),
	'description' => __( 'This is the right section of the sub footer.', 'amazingtimes' ),
) );
