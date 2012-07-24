		<?php get_header(); ?>
		
		<div id="bodywrapper" class="paddingwrapper">
			<div id="maincontent" role="main">
			
				<?php if(have_posts()) : while(have_posts()) : the_post (); ?>
				
					<div>
						<h4 class="posttitle"><?php the_title(); ?></h4>
						<?php the_content(); ?>
					</div>
					
				<?php endwhile; endif; ?>
				
				<div class="phpfilename">Index.php</div>
				
			
			</div>
		</div><!-- End bodywrapper -->
			
		<?php get_footer(); ?>