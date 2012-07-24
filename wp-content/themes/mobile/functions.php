<?php

	define('parameters', 'parameters');
	define('auto', 'auto');
	define('test', 'test');

	//	Remove admin bar
	add_action( 'show_admin_bar', '__return_false' );
	
	//	Remove the generator tag and head junk
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 100, 100, true );
		add_image_size( 'category-post-image', 640, auto );
	}
	
	//	Remove markup for Excerpt
	remove_filter('the_excerpt', 'wpautop');
	
	
	//	Test to see if it is a category
	function post_is_in_descendant_category( $cats, $_post = null )
	{
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category');
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		};
		return false;
	};
	
	//	Inherit category files
	function inherit_template() {
		if (is_category()) {
			$catid = get_query_var('cat');
			if ( file_exists(TEMPLATEPATH . '/category-' . $catid . '.php') ) {
				include( TEMPLATEPATH . '/category-' . $catid . '.php');
				exit;
			};
			
			$cat = &get_category($catid);
			$parent = $cat->category_parent;
			while ($parent) {
				$cat = &get_category($parent);
				if ( file_exists(TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php') ) {
				include (TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php');
				exit;
			};
			
			$parent = $cat->category_parent;
			};
		};
	};

	add_action('template_redirect', 'inherit_template', 1);
	
	
	// Read more links on exceprts
	function new_excerpt_length($length) {
		return 6;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	add_filter('widget_text', 'do_shortcode');


	// unregister all default WP Widgets
	function unregister_default_wp_widgets() {
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);

?>