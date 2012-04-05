						<div class="sliderwrapper" data-colw="780" data-colh="350" data-coln="1" data-colanim="slide">
						
							<div class="sliders">
								<?php
									$imgargs = array(
										'post_type' => 'attachment',
										'meta_value' => $meta_value,
										'numberposts' => -1,
										'post_status' => null,
										'post_parent' => $post->ID
									);
									$imagecount = 0;
									$attachments = get_posts( $imgargs );
									if ( $attachments ) {
										foreach ( $attachments as $attachment ) {
											echo '<div class="slider" data-order="'.$imagecount.'">';
											echo wp_get_attachment_image( $attachment->ID, 'medium' );
											echo '</div>';
											$imagecount++;
										}
									}
								?>
							</div>
							<div class="slidercontrols">
								<div class="slidercontrol scprev" data-btn="prev">‹</div>
								<div class="slidercontrol scnext" data-btn="next">›</div>
							</div>
									
						</div>