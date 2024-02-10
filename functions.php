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
 * Includes
 */
array_map(function ($file) {
	$filepath = "/includes/{$file}.php";
	require_once(get_template_directory() . $filepath);
},[
	'utilities',
	'post-types',
	'taxonomies',
	'template-tags'
]);

/**
 * Functions
 */
array_map(function ($file) {
	$filepath = "/functions/{$file}.php";
	require_once(get_template_directory() . $filepath);
},[
	'theme-setup',
	'dequeue-unused-scripts',
	'enqueue-scripts-styles',
	'disable-comments',
	'custom-block-category'
]);


/**
 * Adds Reusable Blocks to ACF post types
 */
// add_filter('acf/get_post_types', function ($post_types) {
//   if (!in_array('wp_block', $post_types)):
//     $post_types[] = 'wp_block';
// 	endif;
//   return $post_types;
// });