<?php

// Custom Taxonomies

add_action('init', function () {


	// News - Example
	// $parent_page = get_post(wp_get_post_parent_id(get_option('page_for_posts')));
	// register_taxonomy('news-item-tax', ['news-item'], array(
	// 	'hierarchical' => true,
	// 	'show_in_rest' => true,
	// 	'show_admin_column' => true,
	// 	'rewrite' => array(
	// 		'slug' => $parent_page->post_name . '/news/c',
	// 		'with_front' => false
	// 	),
	// ));
});