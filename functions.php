<?php
/**
 * quickland functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package quickland
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function quickland_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on quickland, use a find and replace
		* to change 'quickland' to the name of your theme in all the template files.
		*/

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );



	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	


	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'quickland_setup' );

/**
 * Enqueue scripts and styles.
 */
function quickland_scripts() {
	wp_enqueue_style('poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
	wp_enqueue_style( 'quickland-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), _S_VERSION );
	wp_style_add_data( 'quickland-style', 'rtl', 'replace' );
	wp_enqueue_script('loader-script', get_template_directory_uri() . '/js/loader.js', array('jquery'), '1.0', true);
	wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'quickland-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), _S_VERSION, true );
	wp_enqueue_script( 'quickland-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'quickland_scripts' );


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function add_nav_menus() {
    register_nav_menus( array(
        'menu'=>'menu',
        'menu'=> 'primary',
    ));
}
add_action('init', 'add_nav_menus');

/**
 * Removing menu items
 */
add_action( 'admin_init', function () {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'edit.php' );
});

