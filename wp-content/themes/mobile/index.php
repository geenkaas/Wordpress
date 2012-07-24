		<?php get_header(); ?>
		
		<div id="bodywrapper">
		
			<div id="maincontent" role="main">
				
				<div id="ipadwrapper"></div>

				<div id="searchwrapper">
					<?php get_search_form(); ?>
				</div>

				<div id="inzendingenwrapper">
			
					<?php $args = array(
						'category_name' => 'inzendingen',
						'numberposts' => -1,
						'orderby' => 'rand'
					);
					$lastposts = get_posts($args);
					$postcount = 0;
					foreach($lastposts as $post) : setup_postdata($post);  ?>
					
					<a href="<?php the_permalink(); ?>">
						<div class="linkwrapper" data-count="<?php echo $postcount; ?>">
							<img src="/assets/ads/82x60-<?php echo get_post_meta($id, 'inz_image', true);?>" class="case-thumb" width="82" height="60" alt="<?php echo get_post_meta($id, 'inz_organisatie', true);?>" />
							<h4 class="posttitle"><?php the_title(); ?></h4>
						</div>
					</a>
						
					<?php $postcount++; endforeach; ?>
					
					<div class="phpfilename">Home.php</div>
				
				</div>
			
			</div>
			
		</div><!-- End bodywrapper -->
					
		<div id="showmore">
			Bekijk meer
		</div>

		<?php get_footer(); ?>