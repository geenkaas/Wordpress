		<?php get_header(); ?>

			<div id="maincontent" role="main">
				<div class="paddingwrapper">
					
					<?php if(have_posts()) : while(have_posts()) : the_post (); ?>
					
						<h2><?php the_title();?></h2>
						<?php the_content();?>
						
					<?php endwhile; endif; ?>
					
					<div class="phpfilename">Single.php</div>
					
				</div>
			</div>
			
		<?php get_footer(); ?>