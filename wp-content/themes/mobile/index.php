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
				
				<div class="postwrapper" data-count="<?php echo $postcount; ?>">
					<?php the_time('d/m/Y') ?>
					<a href="<?php the_permalink(); ?>">
						<h4 class="posttitle">
							<?php the_title(); ?>
						</h4>
					</a>
					<?php the_content(); ?>
				</div>
					
				<?php $postcount++; endforeach; ?>
				
				<div class="phpfilename">Index.php</div>
				
			</div>
		</div><!-- End bodywrapper -->

		<?php get_footer(); ?>