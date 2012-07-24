		<?php get_header(); ?>
		
		<div id="bodywrapper" class="paddingwrapper">
			<div id="maincontent" role="main">
			
				<?php $args = array(
					'category_name' => 'uncategorized',
					'numberposts' => -1,
					'orderby' => 'DESC'
				);
				$lastposts = get_posts($args);
				$postcount = 0;
				foreach($lastposts as $post) : setup_postdata($post);  ?>
				
				<a href="<?php the_permalink(); ?>">
					<div data-count="<?php echo $postcount; ?>">
						<h4 class="posttitle"><?php the_title(); ?></h4>
						<?php the_content(); ?>
					</div>
				</a>
					
				<?php $postcount++; endforeach; ?>
				
				<div class="phpfilename">Index.php</div>
				
			
			</div>
		</div><!-- End bodywrapper -->

		<?php get_footer(); ?>