		<?php $geenpage = 'category'; ?>
		<?php get_header(); ?>
		
			<div id="maincontent" role="main">
			
				<div class="tab-cat datum">
					<a href="<?php echo home_url(); ?>/<?php the_time('Y/m/') ?>">
						<?php the_time('m/Y') ?>
					</a>
				</div>
				
				<div class="paddingwrapper">
				
					<h2 class="page-title">Posts gevonden in <?php the_time('m/Y'); ?></h2>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<article id="categorywrapper" class="alignwrapper">
							<div class="alignleft">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('redactieimg'); } ?>
							</div>
							<div class="alignright foundpost">
							
								<h3 class="results posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<span class="datum"><?php the_time('(d/m/Y)') ?></span></h3>
						
								<p class="tagwrapper">
									tags: <?php the_category(' , '); ?>
								</p>
								<?php the_excerpt(); ?>
							</div>
						</article>
									
					<?php endwhile; endif; ?>
					
					<?php get_search_form(); ?>

				</div>
			</div>
			
			<?php get_template_part( 'includes/sidemenu' ); ?>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
		<?php get_footer(); ?>