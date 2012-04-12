		
			<?php $geenpage = 'single'; ?>
			<?php get_header(); ?>
		
			<div id="maincontent" role="main">
					
				<?php if ( have_posts()) : while(have_posts() ) : the_post ();
				foreach( (get_the_category()) as $category ) { 
					$categories = get_categories();
				} ?>
						
				<article class="postwrapper">
						
					<?php the_time('d/m/Y') ?>
					<h3 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<p class="tagwrapper">
						Tags voor deze post: <?php the_category(' , '); ?>
					</p>
					
					<?php the_content(); ?>
	
					<div id="relatedwrapper">
						<h4>Gerelateerde artikelen - <?php echo $category->cat_name; ?></h4>
						
						<ul>
							<?php $args = array(
								'category_name' => $category->cat_name,
								'numberposts' => 5,
								'order'=> 'RAND'
							);
							$lastposts = get_posts($args);
							$postcount = 0;
							foreach($lastposts as $post) : setup_postdata($post);  ?>
							
								<li>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
							
							<?php $postcount++; endforeach; ?>
						</ul>
					</div>
				
				</article>
						
				<?php endwhile; endif; ?>
				
			</div>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
		<?php get_footer(); ?>
