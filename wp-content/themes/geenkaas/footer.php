			</div><!-- End bodywrapper -->
			
		</div><!-- sitewrapper -->
		
		<footer id="footerwrapper">
			<p>
				All rights reserved <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
			</p>
		</footer>
		
		<div id="background">
			<?php $args = array(
				'post_type'		=> 'background',
				'numberposts'	=> 1
			);
			$lastposts = get_posts($args);
			foreach($lastposts as $post) : setup_postdata($post);
			
				if ( has_post_thumbnail() ) { the_post_thumbnail( 'background-image' ); }
				
			endforeach; ?>
		</div>
		
		<?php wp_footer(); ?>
		
		<!-- Load jQuery and custom plugins/scripts -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script async src="scripts/libs/jquery-1.7.1.min.js"><\/script>')</script>
			<script async src="<?php bloginfo("template_url");?>/scripts/script.js"></script>
			
		<!-- Facebook -->
			<div id="fb-root"></div>
			
		<!-- Google Analytics code -->
		<script>
			var _gaq=[['_setAccount','UA-REPLACE'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
			typeof _gaq!="undefined"&&_gaq!==null&&$(document).ajaxSend(function(a,b,c){_gaq.push(["_trackPageview",c.url])})
		</script>

	</body>
</html>






