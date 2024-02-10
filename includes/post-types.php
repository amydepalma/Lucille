<?php

// Custom Post Types

add_action('init', function () {

	// Labels to rename the default "Posts" to something different. Delete if not needed.
	// $get_post_type = get_post_type_object('post');
	// $labels = $get_post_type->labels;
	// $labels->name = 'Insights';
	// $labels->singular_name = 'Insight';
	// $labels->add_new = 'Add Insight';
	// $labels->add_new_item = 'Add Insight';
	// $labels->edit_item = 'Edit Insight';
	// $labels->new_item = 'Insight';
	// $labels->view_item = 'View Insights';
	// $labels->search_items = 'Search Insights';
	// $labels->not_found = 'No insights found.';
	// $labels->not_found_in_trash = 'No insights found in Trash';
	// $labels->all_items = 'All Insights';
	// $labels->menu_name = 'Insights';
	// $labels->name_admin_bar = 'Insights';

	// News - Example
  // $parent_page = get_post(wp_get_post_parent_id(get_option('page_for_posts')));
	// register_post_type('news-item',
  //   array(
  //     'labels' => array(
  //       'name' => __('News'),
  //       'singular_name' => __('News Item'),
  //       'add_new' => __('Add News Item'),
  //       'add_new_item' => __('Add New News Item'),
  //       'edit' => __('Edit'),
  //       'edit_item' => __('Edit News Item'),
  //       'view' => __('View'),
  //       'view_item' => __('View News Item'),
  //       'search_items' => __('Search News'),
  //       'all_items' => __('All News'),
  //       'not_found' => __('No news items found.'),
  //       'not_found_in_trash' => __('No news items found in Trash.'),
  //     ),
  //     'supports' => array(
	// 			'title', 'thumbnail', 'excerpt', 'editor',
	// 		),
  //     'has_archive' => true,
  //     'public' => true,
  //     'menu_icon' => 'dashicons-megaphone',
	// 		'menu_position' => 4,
  //     'show_in_rest' => true,
	// 		'taxonomies' => array('news-item-tax'),
  //     'rewrite' => array(
  //       'slug' => $parent_page->post_name . '/news',
  //       'with_front' => false
  //     )
	// 	)
  // );
});