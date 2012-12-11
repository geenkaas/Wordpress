
		<?php /* Template Name: Page Default */ ?>
		<?php get_header(); ?>

			<div id="maincontent" role="main">

				<?php if ( have_posts() ) : while( have_posts() ) : the_post (); ?>

				<?php $mytags = strip_tags(get_the_tag_list('',',','')); ?>

					<article id="<?php echo $post->post_parent; ?>" class="postwrapper" data-tags="<?php echo $mytags; ?>">

						<h1 class="pageheader">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Ga naar <?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</h1>

						<?php the_post_thumbnail('full', array('class' => 'articleimage'));?>

						<?php the_content();?>

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
