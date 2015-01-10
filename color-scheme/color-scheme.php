<?php
/**
 * Color Scheme
 *
 * @package   Color Scheme
 * @author    Brad Potter
 * @license   GPL-2.0+
 * @copyright Copyright (c) 2014, Brad Potter
 */

/**
 * Add custom body class for Color Scheme
 *
 */	
function color_scheme_class( $classes ) {
	$classes[] = 'color-scheme';
	return $classes;
}
add_filter( 'body_class', 'color_scheme_class', 45 );

/**
 * Registers color scheme options with the WordPress Theme Customizer
 *
 */	
function register_customizer_color_scheme( $wp_customize ) {


	/* - - - - - Color Scheme Section - - - - - */

	$wp_customize->add_section( 'color_scheme_section', array(
		'title'          => __( 'Color Scheme', 'amazing-times' ),
		'priority'       => 10,
	) );

	/* - - - - - Base Color - - - - - */

	$wp_customize->add_setting(
		'color_scheme_base_color',
		array(
			'default'     => '',
			'transport'   => 'refresh'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_scheme_base_color',
			array(
			    'label'      => __( 'Base Color', 'amazing-times' ),
			    'section'    => 'color_scheme_section',
			    'settings'   => 'color_scheme_base_color',
				'priority'   => 10,
			)
		)
	);

	/* - - - - - Site Title Color - - - - - */

	$wp_customize->add_setting(
		'color_scheme_title_color',
		array(
			'default'     => '',
			'transport'   => 'refresh'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_scheme_title_color',
			array(
			    'label'      => __( 'Site Title Color', 'amazing-times' ),
			    'section'    => 'color_scheme_section',
			    'settings'   => 'color_scheme_title_color',
				'priority'   => 20,
			)
		)
	);

	/* - - - - - Site Description Color - - - - - */

	$wp_customize->add_setting(
		'color_scheme_description_color',
		array(
			'default'     => '',
			'transport'   => 'refresh'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_scheme_description_color',
			array(
			    'label'      => __( 'Site Description Color', 'amazing-times' ),
			    'section'    => 'color_scheme_section',
			    'settings'   => 'color_scheme_description_color',
				'priority'   => 30,
			)
		)
	);

}
add_action( 'customize_register', 'register_customizer_color_scheme' );

/**
 * Write styles to head if a Customizer control is selected
 *
 */	
function customizer_color_scheme_css() {
	?>
<!--Customizer CSS--> 
<style type="text/css">
<?php

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme a  { color: %s; }', $csbc_color ); }
$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme a:hover  { color: #222; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .site-header { background-color: %s; }', $csbc_color ); }
$cstc_color = get_theme_mod( 'color_scheme_title_color' ); if ( $cstc_color ) { printf( '.color-scheme .site-title a  { color: %s; }', $cstc_color ); }
$csdc_color = get_theme_mod( 'color_scheme_description_color' ); if ( $csdc_color ) { printf( '.color-scheme .site-description  { color: %s; }', $csdc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .nav-primary .genesis-nav-menu a:hover, .color-scheme .nav-primary .genesis-nav-menu .current-menu-item > a, .color-scheme .nav-primary .genesis-nav-menu .sub-menu a:hover, .color-scheme .nav-primary .genesis-nav-menu .sub-menu .current-menu-item > a:hover { color: %s; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .nav-secondary .genesis-nav-menu a:hover, .color-scheme .nav-secondary .genesis-nav-menu .current-menu-item > a, .color-scheme .nav-secondary .genesis-nav-menu .sub-menu a:hover, .color-scheme .nav-secondary .genesis-nav-menu .sub-menu .current-menu-item > a:hover { color: %s; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .nav-tertiary .genesis-nav-menu a:hover, .color-scheme .nav-tertiary .genesis-nav-menu .current-menu-item > a, .color-scheme .nav-tertiary .genesis-nav-menu .sub-menu a:hover, .color-scheme .nav-tertiary .genesis-nav-menu .sub-menu .current-menu-item > a:hover { color: %s; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .genesis-nav-menu > .facebook:before, .color-scheme .genesis-nav-menu > .twitter:before  { color: %s; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .entry-title a  { color: #222; }', $csbc_color ); }
$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .entry-title a:hover  { color: %s; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .enews-widget input[type="submit"] { background-color: %s; }', $csbc_color ); }
$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .enews-widget input:hover[type="submit"] { background-color: #666; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme button, input[type="button"], .color-scheme input[type="reset"], .color-scheme input[type="submit"], .color-scheme .button { background-color: %s; }', $csbc_color ); }
$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme button:hover, .color-scheme input:hover[type="button"], .color-scheme input:hover[type="reset"], .color-scheme input:hover[type="submit"], .color-scheme .button:hover { background-color: #222; }', $csbc_color ); }

$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .archive-pagination li a:hover, .archive-pagination .active a { background-color: %s; }', $csbc_color ); }
$csbc_color = get_theme_mod( 'color_scheme_base_color' ); if ( $csbc_color ) { printf( '.color-scheme .archive-pagination li a:hover, .archive-pagination .active a { color: #fff; }', $csbc_color ); }

?>

</style>
<!--/Customizer CSS-->
	<?php
}
add_action( 'wp_head', 'customizer_color_scheme_css' );