<?php
/**
 * Base functions and definitions
 *
 * @package Amy DePalma
 * @since 1.0.0
 */

define('LOCAL_DOMAIN', 'amydepalma.local');
define('ALD_VERSION', '1.0.0');

/**
 * Includes & Functions
 */
foreach(glob(get_template_directory() . "/includes/*.php") as $file){
	require $file;
}

foreach(glob(get_template_directory() . "/functions/*.php") as $file){
	require $file;
}

/**
 * Adds Reusable Blocks to ACF post types
 */
// add_filter('acf/get_post_types', function ($post_types) {
//   if (!in_array('wp_block', $post_types)):
//     $post_types[] = 'wp_block';
// 	endif;
//   return $post_types;
// });