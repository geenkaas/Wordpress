		<?php get_header(); ?>

			<div id="maincontent" class="clearfix" role="main">

				<head>
					<h1>
						<?php bloginfo('name'); ?>
					</h1>
				</head>

				<?php $args = array(
					'category_name' => 'Uncategorized',
					'numberposts' => 3
				);
				$lastposts = get_posts($args);
				foreach($lastposts as $post) : setup_postdata($post);  ?>

				<article class="postwrapper post-<?php echo $postcount; ?>">
						<h2 class="posttitle">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<span class="datum"><?php the_time('(d/m/Y)') ?></span>
						</h2>
						<?php the_excerpt(); ?>

				</article>

				<?php endforeach; ?>

				<h3>custom posts</h3>

				<?php
					$postcount = 0;
					$args = array(
						'post_type'	=> 'gks_custom',
						'numberposts' => 3
					);
					$myposts = get_posts($args);
					foreach($myposts as $post) : setup_postdata($post); ?>

					<section id="customid-<?php echo $post->ID; ?>" class="custompost" data-order="<?php echo $postcount; ?>">
						<h3>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Ga naar <?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<?php the_content(); ?>
					</section>

				<?php $postcount++; endforeach; ?>

				<?php if ( current_user_can('level_10') ) { ?>
					<div class="level10">
						home.php (U bent ingelogd als admin)
					</div>
					<div class="<?php echo $post->post_parent; ?>">
						Parent (actie) ID = <?= $post->post_parent; ?>
					</div>
				<?php } ?>

			</div>

		<?php get_footer(); ?>
