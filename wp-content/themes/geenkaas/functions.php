<?php

	define('parameters', 'parameters');
	define('auto', 'auto');
	define('test', 'test');

	//	Remove the generator tag
	remove_action('wp_head', 'wp_generator');

	//	Remove admin bar
	add_action( 'show_admin_bar', '__return_false' );

	//	Post thumbnails
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 100, 100, true );
		add_image_size( 'img-200', 240, auto, true );
		add_image_size( 'img-post', 333, auto, true );
		add_image_size( 'img-background', 1024, 768, true );
		add_image_size( 'img-post', 640, 480, true );
	}

	//	Custom post types
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		register_post_type( 'gks_custom',
			array(
				'labels' => array(
					'name' => __( 'Customs' ),
					'singular_name' => __( 'Custom' ),
					'add_new' => __( 'Voeg custom toe' ),
					'add_new_item' => __( 'Maak hier een nieuwe custom post aan' )
				),
				'public' => true,
				'rewrite' => array('slug' => 'customs'),
				'supports' => array('title','editor','author','thumbnail','excerpt')
			)
		);
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

	//	Search result page rewrite
	function search_url_rewrite_rule() {
		if ( is_search() && !empty($_GET['s'])) {
			wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
			exit();
		}
	}
	add_action('template_redirect', 'search_url_rewrite_rule');


	//	Custom per page meta description from content:
	function dynamic_meta_description() {
		$rawcontent = 	get_the_content();
		if(empty($rawcontent)) {
			$rawcontent = htmlentities(bloginfo('description'));
		} else {
			$rawcontent = apply_filters('the_content_rss', strip_tags($rawcontent));
			$rawcontent = preg_replace('/\[.+\]/','', $rawcontent);
			$chars = array("", "\n", "\r", "chr(13)",  "\t", "\0", "\x0B");
			$rawcontent = htmlentities(str_replace($chars, " ", $rawcontent));
		}
		if (strlen($rawcontent) < 155) {
			echo $rawcontent;
		} else {
			$desc = substr($rawcontent,0,155);
			return $desc;
		}
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

	//	Inherit category files from parent categories
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

				if ($size != "full") {
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

	//	Custom breadcrumbs
function breadcrumbs() {
		global $post;
		$homeLink = get_bloginfo('url');
		$introtext = 'Je bevindt je hier ';
		$delimiter = '<span> > </span>';
		$home = 'Home';
		$before = '<span class="current">';
		$after = '</span>';

	if ( is_home() || is_front_page() ) {

	} elseif ( !is_home() && !is_front_page() || is_paged() ) {

		echo $introtext . '<a href="' . $homeLink . '">' . $home . '</a>' . $delimiter;

	if ( is_category() ) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category($thisCat);
		$parentCat = get_category($thisCat->parent);
		if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		echo $before . single_cat_title('', false) . $after;
	} elseif ( is_day() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
		echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $delimiter;
		echo $before . get_the_time('d') . $after;
	} elseif ( is_month() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
		echo $before . get_the_time('F') . $after;
	} elseif ( is_year() ) {
		echo $before . get_the_time('Y') . $after;
	} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter;
			echo $before . get_the_title() . $after;
		} else {
			$cat = get_the_category(); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, '' . $delimiter);
			echo $before . get_the_title() . $after;
		}
	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;
	} elseif ( is_attachment() ) {
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, '' . $delimiter);
		echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter;
		echo $before . get_the_title() . $after;
	} elseif ( is_page() && !$post->post_parent ) {
		echo $before . get_the_title() . $after;
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb) echo $crumb . '' . $delimiter;
		echo $before . get_the_title() . $after;
	} elseif ( is_search() ) {
		echo $before . 'Search results for "' . get_search_query() . '"' . $after;
	} elseif ( is_tag() ) {
		echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
	} elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata($author);
		echo $before . 'Articles posted by ' . $userdata->display_name . $after;
	} elseif ( is_404() ) {
		echo $before . 'Error 404' . $after;
	}

	if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo __('Page') . ' ' . get_query_var('paged');
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	}

	}
} // end get_breadcrumbs()

	// Read more links on excerpts
	function new_excerpt_length($length) {
		return 60;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	add_filter('widget_text', 'do_shortcode');

	function new_excerpt_more($more) {
		global $post;
		$readmore = 'Lees meer &raquo;';
		return '... <p class="readon"><a href="'. get_permalink($post->ID) . '">'.$readmore.'</a></p>';
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


	//	Shortcodes
	function email_encode_function( $atts, $content ) {
		return '<a href="'.antispambot("mailto:".$content).'">'.antispambot($content).'</a>';
	}
	add_shortcode( 'email', 'email_encode_function' );


?>
