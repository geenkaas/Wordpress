		<?php $geenpage = 'home'; ?>
		<?php get_header(); ?>
		
			<section id="maincontent" role="main">
			
				<div id="searchwrapper">
					<?php get_search_form(); ?>
				</div>
				
				<article class="postwrapper">
				
					<?php get_template_part( 'includes/slider' ); ?>
					
					<div class="blogleft">
						<?php the_time('d/m/Y') ?>
						<h3 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
					</div>

				</article>
					
				<?php endwhile; ?>
				
				
				<?php if ($paged > 1) { ?>
				
					<div class="pagination">
						<div class="alignleft pag-but"><?php next_posts_link('&laquo; Oudere posts') ?></div>
						<div class="alignright pag-but"><?php previous_posts_link('Nieuwere posts &raquo;') ?></div>
					</div>
				
				<?php } else { ?>
				
					<div class="pagination">
						<div class="alignleft pag-but"><?php next_posts_link('&laquo; Oudere posts') ?></div>
						<div class="alignright pag-but"><a href="http://artez.bandbreed.nl/archive/">Bekijk het archief &raquo;</a></div>
					</div>
				
				<?php } ?>
				
				<?php $wp_query = null; $wp_query = $temp;?>
				
			</section>
			
			
			<?php get_template_part( 'includes/sidemenu' ); ?>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
		<?php get_footer(); ?>