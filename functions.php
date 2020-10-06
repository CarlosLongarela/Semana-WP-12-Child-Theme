<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * @package tabernawp/functions.php
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

/**
 * Load Theme translations.
 *
 * @return void
 */
function cl_twp_theme_load_textdomain() {
	load_theme_textdomain( 'tabernawp', get_theme_file_path() . '/languages' );
}
add_action( 'after_setup_theme', 'cl_twp_theme_load_textdomain' );

/**
 * Load Gutemberg and Theme defaults.
 *
 * @return void
 */
/*
add_action(
	'after_setup_theme',
	function() {
		// Disables custom colors in block color palette.
		add_theme_support( 'disable-custom-colors' );

		// Adds support for editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Orange WP', 'tabernawp' ),
					'slug'  => 'orange-wp',
					'color' => '#d0491c',
				),
				array(
					'name'  => __( 'Blue WP', 'tabernawp' ),
					'slug'  => 'blue-wp',
					'color' => '#21759b',
				),
				array(
					'name'  => __( 'Light gray', 'tabernawp' ),
					'slug'  => 'light-gray',
					'color' => '#f0f0f0',
				),
				array(
					'name'  => __( 'Pure White', 'tabernawp' ),
					'slug'  => 'pure-white',
					'color' => '#fff',
				),
				array(
					'name'  => __( 'Pure Black', 'tabernawp' ),
					'slug'  => 'pure-black',
					'color' => '#000',
				),
			)
		);
	}
);
*/

// Register fonts in GeneratePress Theme.
add_filter(
	'generate_typography_default_fonts',
	function( $fonts ) {
		$fonts[] = 'Raleway';
		$fonts[] = 'Grenze Gotisch';

		return $fonts;
	}
);


// Don't load Google Fonts or any other external fonts.
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_dequeue_style( 'generate-fonts' );
	}
);

// Remove Google Fonts from the customizer.
add_action(
	'admin_init',
	function() {
		add_filter( 'generate_google_fonts_array', '__return_empty_array' );
	}
);

/**
 * Change GeneratePress default color palettes.
 *
 * @param array $palettes GeneratePress array palettes, until 8 colors.
 *
 * @return array
 */
/*
function cl_gp_custom_color_palettes( $palettes ) {
	// Could be 8 colors.
	$palettes = array(
		'#d0491c',
		'#21759b',
		'#f0f0f0',
		'#ffffff',
		'#000000',
	);

	return $palettes;
}
add_filter( 'generate_default_color_palettes', 'cl_gp_custom_color_palettes' );
*/

/**
 * Change several comment form defaults like heading
 *
 * @param  array $defaults Default params.
 *
 * @return array
 */
/*
function cl_custom_reply_title( $defaults ) {
	$defaults['title_reply_before'] = '<h2 id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after']  = '</h2>';

	return $defaults;
}
add_filter( 'comment_form_defaults', 'cl_custom_reply_title' );
*/
