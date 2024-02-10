<?php

/**
 * Create a Custom Category (custom-blocks) and reorder all categories so it is at the top
 * https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#managing-block-categories
 * https://wordpress.org/support/topic/reorder-editor-inserter-blocks/
 */
function ald_custom_block_category($categories, $editor_context) {
	// Make sure a post is provided
	if (!empty($editor_context->post)) {

		// Create new category, Custom
		$custom_category = [
			'slug' => 'custom-blocks',
			'title' => __('Custom Blocks', 'custom-layout' ),
		];

		// Move the Custom category to the top
		$reordered_categories = [];
		$reordered_categories[0] = $custom_category;

		// Rebuild cats array
		foreach($categories as $category) {
			$reordered_categories[] = $category;
		}

		return $reordered_categories;
	}
}
add_filter('block_categories_all', 'ald_custom_block_category', 10, 2);