		<?php $geenpage = 'home'; ?>
		<?php get_header(); ?>
		
			<div id="maincontent" role="main">
			
				<?php $args = array(
					'category_name' => 'Uncategorized',
					'numberposts' => -1,
					'order'=> 'DESC'
				);
				$lastposts = get_posts($args);
				$postcount = 0;
				foreach($lastposts as $post) : setup_postdata($post);  ?>
					<article class="post-<?php echo $postcount; ?>">
						<h3 class="posttitle"><?php the_title(); ?></h3>
						<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
						<?php the_content(); ?>
					</article>
				<?php $postcount++; endforeach; ?>
				
			</div>
			<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
		<?php get_footer(); ?>