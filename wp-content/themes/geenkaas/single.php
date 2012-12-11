		<?php get_header(); ?>

			<div id="maincontent" role="main">

				<?php if ( have_posts()) : while(have_posts() ) : the_post (); ?>
				<?php $mytags = strip_tags(get_the_tag_list('',',','')); ?>
				<?php foreach( (get_the_category()) as $category ) {
					$categories = get_categories();
				} ?>

				<article class="postwrapper" data-tags="<?php echo $mytags; ?>">

					<?php the_time('d/m/Y') ?>
					<h1 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

					<p class="tagwrapper">
						Tags voor deze post: <?php the_category(' , '); ?>
					</p>

					<?php the_content(); ?>

					<div id="relatedwrapper">
						<p class="related">Gerelateerde artikelen - <?php echo $category->cat_name; ?></p>

						<ul class="relatedlist">
							<?php $args = array(
								'category_name' => $category->cat_name,
								'numberposts' => 5,
								'order'=> 'RAND'
							);
							$lastposts = get_posts($args);
							$postcount = 0;
							foreach($lastposts as $post) : setup_postdata($post);  ?>

								<li>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php the_title(); ?>
									</a>
								</li>

							<?php $postcount++; endforeach; ?>
						</ul>
					</div>

				</article>

				<?php endwhile; endif; ?>

				<?php if ( current_user_can('level_10') ) { ?>
					<div class="level10">
						page-ontmoet-de-reviewers.php (U bent ingelogd als admin)
					</div>
					<div class="<?php echo $post->post_parent; ?>">
						Parent (actie) ID = <?= $post->post_parent; ?>
					</div>
				<?php } ?>

			</div>

		<?php get_footer(); ?>
