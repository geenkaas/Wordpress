<?php

	define('parameters', 'parameters');
	define('auto', 'auto');
	define('test', 'test');
	
	//	Remove the generator tag
	remove_action('wp_head', 'wp_generator');
	
	//	Remove admin bar
	add_action( 'show_admin_bar', '__return_false' );

	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 100, 100 );
		add_image_size( 'background-image', 1024, 768 );
		add_image_size( 'post-image', 640, 300 );
	}
	
	//	Custom search in posts:
	function custom_search_form( $form, $value = "Zoek", $post_type = 'post' ) {
		$form_value = (isset($value)) ? $value : attribute_escape(apply_filters('the_search_query', get_search_query()));
		$form = '<form role="search" method="get" id="searchform" action="' . get_option('home') . '/" >
			<div>
				<label class="searchtitle screen-reader-text" for="s">
					Zoeken op trefwoord en categorie
				</label><br />
				<input type="hidden" name="post_type" value="'.$post_type.'" />
				<input type="text" placeholder="' . $form_value . '" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="'.esc_attr(__('Zoeken')).'" />
			</div>
		</form>';
		return $form;
	}
	
	
	//	Register widgets for each category
	if ( function_exists('register_sidebar') ) {
		$categories = get_categories(parameters);
		
		// Register a sidebar for each category
		foreach ($categories as $cat) {
			register_sidebar(array(
				'name' => 'Sidebar '.$cat->category_nicename,
				'before_widget' => '<div id="%1$s" class="widget %2$s '.$cat->category_nicename.'">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
			));
		};
	};
	
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

	//	Thumbnail gallery
	
	$slidercount = 0;
	function postimage($size=medium) {
		if ( $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => $num,
			'order' => 'ASC',
			'orderby' => 'ID',
			'post_mime_type' => 'image',)))
		{
			foreach( $images as $image ) {
				$attachmenturl=wp_get_attachment_url($image->ID);
				$attachmentimage=wp_get_attachment_image($image->ID, $size );
				$img_title = $image->post_title;
				$img_desc = $image->post_excerpt;
				
				$slidercount++;
				
				
				if ($size != "full"){
					echo '<div class="sliderimage" volgorde="'.$slidercount.'"><img src="'.$attachmenturl.'" /></div>';
				} else {
					echo '<img src="'.$attachmenturl.'">';
					echo '<a href="'.$attachmenturl.'" rel="lightbox" title="'.$img_desc.'">'.$attachmentimage.'</a>';
				}
			}
		} else {
			echo "";
		}
	}
	
	
	// Creating custom widgets
	class widget_test extends WP_Widget {
		function widget_test() { parent::WP_Widget(false,  $name = 'test gallery'); }  // Gallery test
		
		function widget($args, $instance) {
			extract( $args );
			echo $before_widget;
			?>
				<?php query_posts( 'p=1' ); ?>
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				
					<div class="galleryimage">
 
   						<a href="<?php the_permalink(); ?>" title="titel: <?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail('medium'); ?>
						</a>
					</div>
					<h3 class="widgettitle">
						<a href="<?php the_permalink(); ?>" title="titel: <?php the_title_attribute(); ?>" >
							<?php the_title(); ?>
						</a>
					</h3>
					
					<?php the_excerpt(); ?>
				
				<?php endwhile; wp_reset_query(); endif; ?>
			
			<?php echo $after_widget;
		}
	}

	$array = array(test);
	foreach ($array as &$widgettitle) {
	
		//	Register widgets
		add_action('widgets_init', create_function('', 'return register_widget("widget_'.$widgettitle.'");'));
		
	}
	
	
	
	// Read more links on exceprts
	function new_excerpt_length($length) {
		return 60;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	add_filter('widget_text', 'do_shortcode');
	
	function new_excerpt_more($more) {
		global $post;
		$readmore = 'Lees meer &raquo;';
		return '... <span class="readon"><a href="'. get_permalink($post->ID) . '">'.$readmore.'</a></span>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


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