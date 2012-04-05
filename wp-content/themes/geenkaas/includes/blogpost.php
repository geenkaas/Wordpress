						<div class="blogleft">
							<?php the_time('d/m/Y') ?>
							<h3 class="posttitle"><?php the_title(); ?></h3>
							
							<?php if(is_single()) { ?>
						
								<?php the_content(); ?>
							
							<?php } else { ?>
							
								<?php the_excerpt(); ?>
							
							<?php } ?>
							
						</div>
						<div class="blogright">
							<h4>Over de student</h4>
							<h5>Naam</h5>
							<p><?php echo get_meta('student'); ?></p>
							<h5>Klas</h5>
							<p><?php echo get_meta('klas'); ?></p>
							<h5>Over de student</h5>
							<p><?php echo get_meta('bio'); ?></p>
							<h5>Website</h5>
							<p><a href="<?php echo get_meta('website'); ?>" target="_blank"><?php echo get_meta('website'); ?></a></p>
						</div>