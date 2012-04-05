			<?php $geenpage = 'Archief'; 
			/* Template Name: Archives */
			get_header(); ?>
			
				<div id="maincontent" role="main">
				
					<div class="tab-cat archive">
						<a href="<?php the_permalink(); ?>">
							<?php global $geenpage; echo $geenpage; ?>
						</a>
					</div>
					
					<div id="archivewrapper" class="paddingwrapper">
					
						<?php the_post(); ?>
						<?php get_search_form(); ?>
						
						<div class="alignwrapper">
							<div class="alignleft">
							
								<h3>Zoeken op categorie</h3>
								<ul>
									<?php $args = array (
										'show_count' => 1,
										'hierarchical' => 0,
										'title_li' => 0
									); ?>
									<?php wp_list_categories( $args ); ?>
								</ul>
							
							</div>
							
							<div class="alignright">
							
								<h3>Zoeken op maand en jaar</h3>
								<ul>
									<?php $args = array (
										'type' => 'monthly',
										'show_post_count' => -1
									); ?>
									<?php wp_get_archives( $args ); ?>
								</ul>
								
							</div>
						</div>
							
			
					</div><!-- #paddingwrapper -->
				</div><!-- #maincontent -->
						
				<?php get_template_part( 'includes/sidemenu' ); ?>
				
				<p class="phpfilename"><?php global $geenpage; echo $geenpage; ?>.php</p>
			
			<?php get_footer(); ?>