<?php
	/**
	 * Enqueue editor scripts & styles
	 */
	add_action('enqueue_block_editor_assets', 'ald_custom_block_styles');
	function ald_custom_block_styles($hook) {
		wp_enqueue_style('cip-editor-css', asset_path('scss/editor.css'), array(), ALD_VERSION, 'all');
		// wp_enqueue_script('cip-editor-js', asset_path('js/editor.js'), array('wp-blocks', 'wp-dom'), ALD_VERSION, true);
	}

	/**
	 * Enqueue frontend scripts & styles
	 */
	add_action('wp_enqueue_scripts', 'ald_enqueue_assets', 15);
	function ald_enqueue_assets() {
		wp_enqueue_style('cip-css', asset_path('scss/main.css'), array(), ALD_VERSION, 'all');
		// wp_enqueue_script('cip-js', asset_path('js/main.js'), array(), ALD_VERSION , true );
	}