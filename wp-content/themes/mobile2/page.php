		<?php get_header(); ?>

			<div id="maincontent" role="main">
					
					<?php if(have_posts()) : while(have_posts()) : the_post (); ?>
						<div id="stemmenwrapper">
							<h4 class="posttitle"><?php the_title(); ?></h4>
							<button id="single-stem">Stemmen</button>
							<img src="/assets/ads/<?php echo get_post_meta($id, 'inz_image', true);?>" alt="<?php echo get_post_meta($id, 'inz_organisatie', true);?>" />
							
						</div>
						
						<div id="stemwrapper">
							<h3 class="stemtitle allcaps">Stem op deze advertentie</h3>
							<div id="mc_embed_signup">
								<form action="http://nrccharityawards.us5.list-manage.com/subscribe/post?u=6ead5bbbc5da8fb730cd353f1&amp;id=6fa6a77215" method="post" id="stemformulier" name="mc-embedded-subscribe-form" class="validate" target="_blank">
									<label for="mce-EMAIL" class="allcaps">E-mailadres<span class="asterisk">*</span></label>
									<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
									<input type="hidden" value="<?php the_title(); ?>" name="ADVERT" class="required" id="ADVERT" required>
									<input type="hidden" value="<?= $id ?>" name="ID" class="required" id="ID" required>
									<input type="submit" value="Stem!" name="subscribe" id="mc-embedded-subscribe" class="button">
								</form>
							</div>
							<div><br />
							<p class="stemresult allcaps">Huidig aantal stemmen:<span style="color:#015171"> #stemmen</span></p>
							<small>*  Om het stemmen eerlijk en transparant te laten verlopen, verzoeken we u om uw e-mailadres op te geven.</small>
							</div>
						</div>
						<div id="omschrijvingwrapper">
							
							<h4>Beschrijving advertentie</h4>
							<?php the_content(); ?>
							<p><strong>Bureau:</strong> <?php echo get_post_meta($id, 'inz_bureau', true);?> <br>
							<strong>Creatie:</strong> <?php echo get_post_meta($id, 'inz_creatie', true);?></p> 
							<p><strong>URL:</strong> <a href="<?php echo get_post_meta($id, 'inz_url', true);?>" target="_blank"><?php echo get_post_meta($id, 'inz_url', true);?></a><br>
							<strong>E-mail:</strong> <a href="mailto:<?php echo get_post_meta($id, 'inz_email', true);?>" target="_blank"><?php echo get_post_meta($id, 'inz_email', true);?></a></p> 
									
						</div>
					<?php endwhile; endif; ?>
					
					<div class="phpfilename">Single.php</div>
					
			</div>
			
		<?php get_footer(); ?>