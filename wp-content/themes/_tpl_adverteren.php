				<?php /* Template Name: Adverteren */ ?>
				
				<?php get_header(); ?>
					
					<div id="content" class="wrapper" role="main">
						
						<div id="adverteren" class="wrapper">
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								
								<div class="page-title wrapper margin-2">
									<?php the_title(); ?>
								</div>
							
							<?php endwhile; endif; ?>
							
							<div id="advertise-expander" class="margin-4 wrapper">
								<div id="expander-header">
									<div class="last">
										<h2>Download hier doelgroepinformatie per branche</h2>
									</div>
									<!--<div class="span-4 last">
										<div class="padding-20">
											<ul>
												<li><a class="category doelgroep" href="#">doelgroep</a></li>
												<li><a class="category sector" href="#">branches</a></li>
											</ul>
										</div>
									</div>-->
								</div>
								<div id="expander-body" class="wrapper">
									<div class="span-4">
									<?php
										$args = array(
										'posts_per_page'  => 20,
										'order' 		  => 'ASC',
										'meta_key'        => 'expander-category',
										'meta_value'      => 'sector',
										'post_type'       => 'expander');
										query_posts($args); 
									?>
											<div id="expander-menu" class="padding-20 sector">
												<ul>
													<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
														<li><a href="#" rel="<?php echo basename(get_permalink()); ?>"><?php the_title(); ?></a></li>
													<?php endwhile; endif; ?>
												</ul>
											</div>
									<?php wp_reset_query(); ?>
									
									<?php
										$args = array(
										'posts_per_page'  => 20,
										'order' 		  => 'ASC',
										'meta_key'        => 'expander-category',
										'meta_value'      => 'doelgroep',
										'post_type'       => 'expander');
										query_posts($args); 
									?>
											<div id="expander-menu" class="padding-20 doelgroep">
												<ul>
													<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
														<li><a href="#" rel="<?PHP echo basename(get_permalink()); ?>"><?php the_title(); ?></a></li>
													<?php endwhile; endif; ?>
												</ul>
											</div>
									<?php wp_reset_query(); ?>
										</div>
										
									<?php
										$args = array(
										'posts_per_page'  => 1,
										'order' 		  => 'ASC',
										'meta_key'        => 'expander-category',
										'meta_value'      => 'sector',
										'post_type'       => 'expander');
										query_posts($args); 
									?>
											<div class="span-8 last" id="expander-content-container">
												<div id="expander-content" class="padding-20 margin-2">
													<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
														<div class="margin-1"><h2 class="title"><?php the_title(); ?></h2></div>
														<div class="margin-1"><?php the_post_thumbnail('expander'); ?></div>
														<?php the_content(); ?>
													<?php endwhile; endif; ?>
												</div>
											</div>
									<?php wp_reset_query(); ?>
									<div id="close">
										<a href="#close" class="button-bg-grey">sluiten</a>
									</div>
								</div>
								
							</div>
							
							
							
							
							
							<h3 class="block-title">Case highlight</h3>
							<div id="casewrapper" class="sliderwrapper bg-grey span-12 margin-4">
									<div class="sliderdiv">
										<?php $args = array(
										'numberposts' => 3,
										'post_type' => 'case',
										'order' => 'DESC',
										'meta_key' => 'case-featured',
										'meta_value'  => '1',
										'orderby' => 'rand');
										$lastposts = get_posts($args);
										$postcount = 0;
										foreach($lastposts as $post) : setup_postdata($post); 
										$postcount++; ?>
											<div class="slidediv" order="<?php echo $postcount; ?>">
												<div class="slidersidetext text-compact">
													<div class="title">
														<h3><?php the_title(); ?></h3>
														<div id="icons-small">
															<?php
																$icounter = 0;
																$krant = get_meta('portfolio-icons-krant');
																$laptop  = get_meta('portfolio-icons-laptop');
																$ipad = get_meta('portfolio-icons-ipad');
																$iphone = get_meta('portfolio-icons-iphone');
																$event = get_meta('portfolio-icons-event');
																$icons = array($event, $iphone, $ipad, $laptop, $krant);
																$ids = array('event', 'iphone', 'ipad', 'laptop', 'krant');
																
																foreach($icons as $icon){
																	if($icon){
																		echo '<div id="icon-'.$ids[$icounter].'"></div>';
																	}
																	$icounter++;
																}
															?>
														</div>
													</div>
													<?php the_content(); ?>
													<a class="button-bg-grey" href="<?php the_permalink(); ?>">Bekijk de case</a>
													<div class="slider-buttons">
														<a href="cases" class="button-bg-grey">Meer Cases</a>
														<a href="business-development/" class="button-bg-grey">Business Development</a>
													</div>
												</div>
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('case-featured'); ?></a>
											</div>
										<?php endforeach; ?>
									</div>
									<div class="slidercontrols">
												<div class="slidercontrol" btn="prev">prev</div>
												<div class="bolletjes"></div>
												<div class="slidercontrol" btn="next">next</div>
									</div>
							</div>
							
							
							
							<?php
							$counter = 0;
							$args = array(
							'posts_per_page'  => 4,
							'post_type'       => 'adverteren-block');
							query_posts($args);
							?>
							<?php if (have_posts()) : ?>
							<div id="featured" class="wrapper margin-3">
								<div class="block-title">
									adverteren bij nrc media
								</div>
								<div class="wrapper border-top-grey-3 grey-right">
								<?php while (have_posts()) : the_post(); $counter++; ?>
									<div id="home-block-<?php the_ID(); ?>" class="featured-item span-3 <?php if($counter % 4 == 0){ echo 'last'; } ?>">
										<h2><a href="<?php meta('block-link');?>"><?php the_title(); ?></a></h2>
										<div class="item-content text-compact">
											<div class="item-image bg-bluedient rounded-3 margin-1">
												<a href="<?php meta('block-link');?>">
													<?php the_post_thumbnail('featured-thumbnail'); ?>
												</a>
											</div>
											<?php the_content(); ?>
										</div>	
									</div>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
							<?php wp_reset_query(); ?>

							
						</div>
						
					</div><!-- End content -->
					
				<?php get_footer(); ?>