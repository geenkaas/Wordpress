		<?php get_header(); ?>

			<div id="maincontent" role="main">
				<div class="paddingwrapper">

					<h1 class="pageheader"><?php single_cat_title('Posts gevonden in de categorie '); ?></h1>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article class="categorywrapper">

							<h2 class="results posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<span class="datum"><?php the_time('(d/m/Y)') ?></span>

							<p class="tagwrapper">
								tags: <?php the_category(' , '); ?>
							</p>
							<?php the_excerpt(); ?>

						</article>

					<?php endwhile; endif; ?>

					<?php get_search_form(); ?>

					<?php if ( current_user_can('level_10') ) { ?>
						<div class="level10">
							category.php (U bent ingelogd als admin)
						</div>
						<div class="<?php echo $post->post_parent; ?>">
							Parent (actie) ID = <?= $post->post_parent; ?>
						</div>
					<?php } ?>

				</div>
			</div>

		<?php get_footer(); ?>
