					<?php get_header(); ?>

					<div id="maincontent" role="main">
						<div id="searchresults">

							<?php if ( have_posts() ) : ?>
								<head>
									<h1 class="page-title">
										<?php printf( __( 'Zoekresultaten voor: %s'), '<span>' . get_search_query() . '</span>' ); ?>
									</h1>
								</head>

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<section class="searchresults">

										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail('full', array('class' => 'articleimage'));
										} ?>

										<h2 class="posttitle">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<span class="datum"><?php the_time('(d/m/Y)') ?></span>
										</h2>
										<?php the_excerpt(); ?>

									</section>

								<?php endwhile; endif; ?>

							<?php else : ?>
								<div id="post-0" class="post no-results not-found">
									<h1 class="entry-title"><?php _e( 'Geen zoekresultaten'); ?></h1>

									<div class="entry-content">
										<p><?php _e( 'Helaas, er bestaan geen berichten met uw zoekterm, probeer het met een andere zoekterm' ); ?></p>

									</div>
								</div>
							<?php endif; ?>

							<?php echo custom_search_form( null, 'Uw zoekterm', 'post'); ?>

							<?php if ( current_user_can('level_10') ) { ?>
								<div class="level10">
									search.php (U bent ingelogd als admin)
								</div>
							<?php } ?>

						</div>
					</div>

					<?php get_footer(); ?>
