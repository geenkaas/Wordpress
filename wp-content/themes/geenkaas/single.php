		
			<?php $geenpage = 'single'; ?>
			<?php get_header(); ?>
		
			<section id="maincontent" role="main">
			
				<div id="searchwrapper">
					<?php get_search_form(); ?>
				</div>
					
				<?php if ( have_posts()) : while(have_posts() ) : the_post ();
					foreach( (get_the_category()) as $category ) {
						
						$categories = get_categories(); ?>
					
						<div class="tab-cat <?php echo $category->cat_name; ?>">
							<a href="<?php echo home_url(); ?>/<?php echo $category->cat_name; ?>">
								<?php echo $category->cat_name; ?>
							</a>
						</div>
						
				<?php } ?>
						
				<article class="postwrapper">
			
					<?php get_template_part( 'includes/slider' ); ?>
						
					<?php the_time('d/m/Y') ?>
					<h4 class="posttitle"><?php the_title(); ?></h4>
					<?php the_content(); ?>
					
					<p class="tagwrapper">
						tags: <?php the_category(' , '); ?>
					</p>
	
					<div id="relatedwrapper">
						<h4>Gerelateerde artikelen - <?php echo $category->cat_name; ?></h4>
						<?php query_posts('category_name='.$category->cat_name .'&showposts=3'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="relatedposts">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail('relatedpost'); } ?>
									<?php the_title(); ?>
								</a>
							</div>
						<?php endwhile; endif; wp_reset_query(); ?>
					</div>
				
				</article>
						
				<?php endwhile; endif; ?>
				
				<div class="pagination">
					<?php if(is_single()) { ?>
				
						<?php $posts = query_posts($query_string); if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="alignleft pag-but"><?php previous_post_link('%link','« Vorige post'); ?></div>
							<div class="alignright pag-but"><?php next_post_link('%link','Volgende post »'); ?></div>
						<?php endwhile; endif; ?>
					
					<?php } else { ?>
					
							<?php posts_nav_link(); ?>
					
					<?php } ?>
				</div>
				
			</section>
			
			<?php get_template_part( 'includes/sidemenu' ); ?>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
		<?php get_footer(); ?>
