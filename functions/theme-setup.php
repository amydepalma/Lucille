<?php

	function ald_theme_setup() {
		// Add excerpts to pages
		add_post_type_support('page', 'excerpt');

		/**
		 * Enable plugins to manage the document title
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
		 */
		add_theme_support('title-tag');

		/**
		 * Enable post thumbnails
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

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
		 * Register navigation menus
		 */
		register_nav_menus([
			'primary_nav' => __('Primary', 'cip'),
			'utility_nav' => __('Utility', 'cip')
		]);


		/**
		 * Block editor features
		 */
		// Remove default patterns
		// remove_theme_support("core-block-patterns");

		// Prevent loading patterns from the WordPress.org pattern directory
		// add_filter( 'should_load_remote_block_patterns', '__return_false' );

		// Remove default block categories
		// unregister_block_pattern_category('buttons');

		// Editor styles
		add_theme_support("editor-styles");

		if (!is_user_logged_in()) {
			wp_deregister_script('jquery');
			wp_register_script('jquery', false);
		}
	}
	add_action( 'after_setup_theme', 'ald_theme_setup' );