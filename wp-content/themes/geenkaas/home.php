		<?php $geenpage = 'home'; ?>
		<?php get_header(); ?>
		
			<div id="maincontent" role="main">
				<div class="paddingwrapper">
			
					<?php $args = array(
						'category_name' => 'Uncategorized',
						'numberposts' => 3,
						'order'=> 'DESC'
					);
					$lastposts = get_posts($args);
					$postcount = 0;
					foreach($lastposts as $post) : setup_postdata($post);  ?>
					
					<article class="postwrapper post-<?php echo $postcount; ?>">
						
						<div class="blogwrapper">
							<?php the_time('d/m/Y') ?>
							<h3 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
	
					</article>
						
					<?php $postcount++; endforeach; ?>
				
				</div>
			</div>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
		<?php get_footer(); ?>