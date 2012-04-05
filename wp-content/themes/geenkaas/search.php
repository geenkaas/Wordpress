					<?php $geenpage = 'search'; ?>
					<?php get_header(); ?>
		
					<section id="maincontent" role="main">
						<div class="paddingwrapper">
						<?= custom_search_form( null, 'Uw zoekterm', 'post'); ?>
						
						<?php if ( have_posts() ) : ?>
						
							<h2 class="page-title"><?php printf( __( 'Zoekresultaten voor: %s'), '<span>' . get_search_query() . '</span>' ); ?></h2>
							
							<ul id="searchresults">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									
									<li>
										
										<div class="alignwrapper">
											<div class="alignleft">
												<?php if ( has_post_thumbnail() ) { the_post_thumbnail('redactieimg'); } ?>
											</div>
											<div class="alignright foundpost">
											
												<h3 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												<span class="datum"><?php the_time('(d/m/Y)') ?></span></h3>
										
												<p class="tagwrapper">
													tags: <?php the_category(' , '); ?>
												</p>
												<?php the_excerpt(); ?>
											</div>
										</div>
									</li>
								
								<?php endwhile; endif; ?>
							</ul>
								
						<?php else : ?>
						
							<div id="post-0" class="post no-results not-found">
							
								<h2 class="entry-title"><?php _e( 'Geen zoekresultaten'); ?></h2>
								
								<div class="entry-content">
									<p><?php _e( 'Helaas, er bestaan geen berichten met uw zoekterm, probeer het met een andere zoekterm' ); ?></p>
									
								</div><!-- .entry-content -->
							</div><!-- #post-0 -->
						<?php endif; ?>
		

						</div>						
					</section>
					
					<?php get_template_part( 'inc_sidemenu' ); ?>
					
					<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
		
					<?php get_footer(); ?>
