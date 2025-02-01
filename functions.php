<?php /* https://developer.wordpress.org/themes/basics/theme-functions/ */

if ( ! function_exists( 'twispack_setup' ) ) {
	function twispack_setup() {

		/* Let WordPress automatically generate the <head>'s <title> tag for SEO */
		add_theme_support( 'title-tag' );

	  /**
		 * Enable featured images (post thumbnails), commonly displayed on index,
		 * archive, and blog pages and also used as the thumbnail image when sharing
		 * to social media
		 */
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'twispack_setup' );
}

/* Enqueue scripts and styles */
if ( ! function_exists( 'twispack_enqueue_scripts' ) ) {
	function twispack_enqueue_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'tw', get_template_directory_uri() . '/dist/main.css' );
	}
	add_action( 'wp_enqueue_scripts', 'twispack_enqueue_scripts' );
}

/* Register main menus */
function twispack_register_menus() {
  register_nav_menu( 'main_menu', 'Main Menu' );
  /* Print this menu in the theme template by copying this code:
    <?php
      if (has_nav_menu( 'main_menu') :
        wp_nav_menu(array('theme_location' => 'main_menu'));
      endif;
    ?>
  */
}
add_action( 'after_setup_theme', 'twispack_register_menus' );
