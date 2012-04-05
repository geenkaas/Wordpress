			</div><!-- End bodywrapper -->
			
			<div id="backtotop">
				Back to top
			</div>
			
		</div><!-- sitewrapper -->
		
		<footer id="footerwrapper">
		</footer>
		
		<div id="background">
			<?php
				$args = array(
					'post_type'		=> 'background',
					'numberposts'	=> 1
				);
				$lastposts = get_posts($args);
				foreach($lastposts as $post) : setup_postdata($post);
				
					if ( has_post_thumbnail() ) { the_post_thumbnail( 'background-image' ); }
					
				endforeach;
			?>
		</div>
		
		<?php wp_footer(); ?>
		
		<!-- Load jQuery and custom plugins/scripts -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
			<script src="<?php bloginfo("template_url");?>/scripts/script.js"></script>
			
		<!-- Facebook -->
			<div id="fb-root"></div>
			
		<!-- Google Analytics code -->
		<script>
			var _gaq=[['_setAccount','UA-17589656-6'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
			typeof _gaq!="undefined"&&_gaq!==null&&$(document).ajaxSend(function(a,b,c){_gaq.push(["_trackPageview",c.url])})
		</script>

		<!-- Piwik Tracking Code -->
		<script type="text/javascript">
			var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.bandbreed.nl/" : "http://piwik.bandbreed.nl/");
			document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
			try { var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 21);
				piwikTracker.trackPageView();
				piwikTracker.enableLinkTracking(); } catch( err ) {}
		</script>
		<noscript><p><img src="http://piwik.bandbreed.nl/piwik.php?idsite=21" style="border:0" alt="piwik" /></p></noscript>
		<!-- End Piwik Tracking Code -->

	</body>
</html>






