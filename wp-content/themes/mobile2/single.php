		<?php get_header(); ?>

			<div id="maincontent" role="main">
					
					<?php if(have_posts()) : while(have_posts()) : the_post (); ?>
						<div id="stemmenwrapper">
							<h4 class="posttitle"><?php the_title(); ?></h4>
							<button id="single-stem">Stemmen</button>
							<img src="http://c347776.r76.cf1.rackcdn.com/<?php echo get_post_meta($id, 'inz_image', true);?>" alt="<?php echo get_post_meta($id, 'inz_organisatie', true);?>" />
						</div>
						
						<div id="stemwrapper">
							<h3 class="stemtitle allcaps">Stem op deze advertentie</h3>
								<div id="mc_embed_signup">
									<form action="http://nrccharityawards.us5.list-manage.com/subscribe/post?u=6ead5bbbc5da8fb730cd353f1&amp;id=6fa6a77215" method="post" id="stemformulier" name="mc-embedded-subscribe-form" class="validate stemformulier" novalidate="novalidate">
										<div class="veld">
											<label for="mce-EMAIL">E-mailadres<span class="asterisk">*</span></label>
											<input type="email" value="" name="EMAIL" class="required email mce_email" id="<?= $id ?>" required>
										</div>
										<div class="alignwrapper">
										<div class="checkbox">
											<div class="alignleft w10">
												<input type="checkbox" value="Ik ga akkoord met de Algemene voorwaarden" class="required checkfloat akkoord" id="akkoord">
											</div>
											<div class="alignright w90">
												<label class="checkfloat">Ik ga akkoord met de <a href="/actievoorwaarden" TARGET="_blank">Actievoorwaarden</a></label>
											</div>
										</div>
									</div>
									<div class="alignwrapper">
										<div class="checkbox">
											<div class="alignleft w10">
												<input type="checkbox" name="news" id="news" value="Ja" class="checkfloat news">
											</div>
											<div class="alignright w90">
												<label class="checkfloat">Schrijf mij in voor de nieuwsbrief</label>
											</div>
										</div>
									</div>
									<div class="alignwrapper">
										<div class="veld">
											<input type="hidden" value="<?php the_title(); ?>" name="ADVERT" class="required" id="ADVERT" required>
											<input type="hidden" value="<?= $id ?>" name="ID" class="required id" id="id" required>
										</div>
										<div class="clear">
											<input type="submit" value="Stem!" name="subscribe" id="mc-embedded-subscribe" class="button">
										</div>
									</div>
								</form>
							</div>
							<div>
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
					
					
					<!-- AddThis Button BEGIN -->	
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                        <h4>Deel deze advertentie!</h4>
                        <a class="addthis_button_facebook" style="cursor:pointer" addthis:url="http://www.nrccharityawards.nl/?s=<?= urlencode(get_the_title()) ?>"
addthis:title="<?php the_title(); ?>" addthis:description="<?php the_title(); ?>"></a>
                        <a class="addthis_button_twitter" style="cursor:pointer" addthis:url="http://www.nrccharityawards.nl/?s=<?= urlencode(get_the_title()) ?>"
addthis:title="<?php the_title(); ?>" addthis:description="<?php the_title(); ?>"></a>
                        <a class="addthis_button_hyves" style="cursor:pointer" addthis:url="http://www.nrccharityawards.nl/?s=<?= urlencode(get_the_title()) ?>"
addthis:title="<?php the_title(); ?>" addthis:description="<?php the_title(); ?>"></a>
                        <a class="addthis_button_compact" addthis:url="http://www.nrccharityawards.nl/?s=<?= urlencode(get_the_title()) ?>"
addthis:title="<?php the_title(); ?>" addthis:description="<?php the_title(); ?>"></a>
                        <a class="addthis_counter addthis_bubble_style" addthis:url="http://www.nrccharityawards.nl/?s=<?= urlencode(get_the_title()) ?>"
addthis:title="<?php the_title(); ?>" addthis:description="<?php the_title(); ?>"></a>
                    </div>
					<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fdb3e9a11177a7b"></script>
					<!-- AddThis Button END -->
					
					<div class="phpfilename">Single.php</div>
					
			</div>
			
		<?php get_footer(); ?>