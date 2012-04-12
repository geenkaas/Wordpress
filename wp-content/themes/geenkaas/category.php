		<?php $geenpage = 'category'; ?>
		<?php get_header(); ?>
		
			<div id="maincontent" role="main">
				<div class="paddingwrapper">
				
					<h3 class="pageheader"><?php single_cat_title('Posts gevonden in de categorie '); ?></h3>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<article class="categorywrapper foundpost">
							
							<h3 class="results posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<span class="datum"><?php the_time('(d/m/Y)') ?></span>
					
							<p class="tagwrapper">
								tags: <?php the_category(' , '); ?>
							</p>
							<?php the_excerpt(); ?>
							
						</article>
									
					<?php endwhile; endif; ?>
					
					<?php get_search_form(); ?>

				</div>
			</div>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
		<?php get_footer(); ?>