		<?php get_header(); ?>
		
			<div id="maincontent" role="main">
			
				<ul class="clean">
					<?php $args = array(
						'category_name' => 'Uncategorized',
						'numberposts' => -1,
						'order'=> 'ASC'
					);
					$lastposts = get_posts($args);
					$postcount = 0;
					foreach($lastposts as $post) : setup_postdata($post); 
					$postcount++; ?>
						<li class="list<?php echo $postcount; ?>">
							<h3 class="posttitle"><?php the_title(); ?></h3>
							<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
							<?php the_content(); ?>
						</li>
					<?php endforeach; ?>
				</ul>
				
			</div>
			
		<?php get_footer(); ?>