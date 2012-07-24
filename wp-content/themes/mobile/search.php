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
																<form action="http://nrccharityawards.us5.list-manage.com/subscribe/post?u=6ead5bbbc5da8fb730cd353f1&amp;id=6fa6a77215" method="post" id="stemformulier-<?php echo $postcount; ?>" name="mc-embedded-subscribe-form" class="validate stemformulier" novalidate="novalidate">
																<div class="veld">
																<label for="mce-EMAIL">E-mailadres<span class="asterisk">*</span></label>
																<input type="email" value="" name="EMAIL" class="required email mce_email" id="<?= $id ?>" required>
																</div>
													<div class="alignwrapper">
													<div class="checkbox">
														<div class="alignleft w10">
															<input type="checkbox" value="Ik ga akkoord met de Algemene voorwaarden" class="required checkfloat akkoord" id="akkoord-<?php echo $postcount; ?>">
														</div>
														<div class="alignright w90">
															<label class="checkfloat">Ik ga akkoord met de <a href="http://www.nrccharityawards.nl/voorwaarden" TARGET="_blank">Actievoorwaarden</a></label>
														</div>
													</div>
													<div class="checkbox">
														<div class="alignleft w10">
															<input type="checkbox" name="news" id="news-<?php echo $postcount; ?>" value="Ja" class="checkfloat news">
														</div>
														<div class="alignright w90">
															<label class="checkfloat">Schrijf mij in voor de nieuwsbrief</label>
														</div>
													</div>
												</div>
												<div class="alignwrapper">
													<div class="veld">
														<input type="hidden" value="<?php the_title(); ?>" name="ADVERT" class="required" id="ADVERT" required>
														<input type="hidden" value="<?= $id ?>" name="ID" class="required id" id="id-<?php echo $postcount; ?>" required>
													</div>
													<div class="clear">
														<input type="submit" value="Stem!" name="subscribe" id="mc-embedded-subscribe" class="button">
													</div>
												</div>
											</form>
							</div>
							<div><br />
							<p class="stemresult">Huidig aantal stemmen: <span id="stemteller"><?= display_vote_count($id); ?></span></p>
							<small>* Om het stemmen eerlijk en transparant te laten verlopen, verzoeken we u om uw e-mailadres op te geven.</small>
							</div>
						</div>
						<div id="omschrijvingwrapper">
							
							<h4>Beschrijving advertentie</h4>
							<?php the_content(); ?>
							<p><strong>Bureau:</strong> <?php echo get_post_meta($id, 'inz_bureau', true);?> <br>
							<strong>Creatie:</strong> <?php echo get_post_meta($id, 'inz_creatie', true);?></p> 
							<p><strong>URL:</strong> <a href="<?php echo get_post_meta($id, 'inz_url', true);?>" target="_blank"><?php echo get_post_meta($id, 'inz_url', true);?></a></p> 
									
						</div>
					<?php endwhile; endif; ?>
					
					<div class="phpfilename">Single.php</div>
					
			</div>
			
		<?php get_footer(); ?>