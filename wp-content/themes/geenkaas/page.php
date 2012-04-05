				<?php $geenpage = 'page'; 
				get_header(); ?>
			

			<div id="maincontent" role="main">
				
				<div class="tab-cat archive">
					<a href="<?php the_permalink(); ?>">
						<?php global $geenpage; echo $geenpage; ?>
					</a>
				</div>
				
				<article class="postwrapper">
				
					<?php get_template_part( 'includes/slider' ); ?>
					
					<div class="paddingwrapper">

						<?php if(have_posts()) : while(have_posts()) : the_post (); ?>
						
							<h3 class="pageheader"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_content();?>
							<div class="button">
								<a href="http://www.artez.nl/" target="_blank">
									Naar de BDKV website »
								</a>
							</div>
							
						<?php endwhile; endif; ?>
					</div>
					<div id="locatiewrapper">
						<div class="paddingwrapper">
							
							<h4>Locatie</h4>
							<?php $args = array(
									'post_type'	=> 'locatie',
									'numberposts' => -1,
									'order' => 'ASC'
								);
								$lastposts = get_posts($args);
								foreach($lastposts as $post) : setup_postdata($post);
								
								$locatie = get_meta('naamloc'); ?>
									
									<div class="locaties alignleft">
										
										<a href="<?php echo get_meta('gmaps'); ?>" target="_blank">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); } ?>
										</a>
										<h3>Locatie <?php the_title(); ?></h3>
										<p><?php echo get_meta('adres'); ?><br />
										<?php echo get_meta('postcode'); ?><br />
										<span class="icons icon_telefoon"><?php echo get_meta('telefoon'); ?></span></p>
										
										<h4>Directie</h4>
										<?php
											$args = array(
												'post_type'		=> 'directielid',
												'numberposts'	=> -1,
											);
											$lastposts = get_posts($args);
											foreach ($lastposts as $post) : setup_postdata($post);
											if ( $locatie == get_meta('dir_locatie') ) { ?>
											<div class="directielidwrapper">
												<div class="pasfoto alignleft">
													<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
												</div>
												
												<div class="alignleft">
													<h5><?php the_title(); ?></h5>
													<p>
														<span class="icons icon_telefoon"><?php echo get_meta('dir_telefoon'); ?></span><br />
														<a href="mailto:<?php echo get_meta('dir_email'); ?>" target="_blank" class="icons icon_email"><?php echo get_meta('dir_email'); ?></a>
													</p>
												</div>		
				
											</div>
										<?php } endforeach; ?>
							
									</div>
									
							<?php endforeach; ?>
							
						</div>
					</div>
						
				</article>
			</div>
						
			<?php get_template_part( 'includes/sidemenu' ); ?>
			
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
			<?php get_footer(); ?>
