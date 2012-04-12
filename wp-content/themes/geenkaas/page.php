				<?php $geenpage = 'page'; 
				get_header(); ?>
			

			<div id="maincontent" role="main">
				<div class="paddingwrapper">
				
					<article class="postwrapper">

						<?php if(have_posts()) : while(have_posts()) : the_post (); ?>
						
							<h3 class="pageheader"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_content();?>
							
						<?php endwhile; endif; ?>
							
					</article>
					
				</div>
			</div>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
			<?php get_footer(); ?>
