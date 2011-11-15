			</div><!-- End bodywrapper -->
		</div><!-- sitewrapper -->
		
		<footer>
			<div id="footerwrapper">
				<p>All rights reserved <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a> / Design by <a href="http://www.bandbreed.nl" target="_blank">Bandbreed</a></p>
			</div><!-- end of footerwrapper -->
		</footer>
		
		<?php wp_footer(); ?>
		
		<div id="background"></div>
		
		<!-- Load jQuery and custom plugins/scripts -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
			<script src="<?php bloginfo("template_url");?>/scripts/script.js"></script>
			
		<!-- Google +1 -->
			<script type="text/javascript">
				window.___gcfg={lang:"nl"},function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src="https://apis.google.com/js/plusone.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}()
			</script>
		<!-- Linkedin inShare -->
			<script src="http://platform.linkedin.com/in.js"></script>
		<!-- Twitter -->
			<!--<script src="http://twitter.com/statuses/user_timeline/exactwatjezoekt.json?callback=twitterCallback2&count=10"></script>-->
			<script src="//platform.twitter.com/widgets.js"></script>
		<!-- Facebook -->
			<div id="fb-root"></div>
			<script>window.fbAsyncInit=function(){FB.init({appId:"REPLACE_THIS",status:!0,cookie:!0,xfbml:!0})},function(){var a=document.createElement("script");a.src=document.location.protocol+"//connect.facebook.net/nl_NL/all.js",a.async=!0,document.getElementById("fb-root").appendChild(a)}()</script> 
			
		<!-- Google Analytics code -->
		<script>
			var _gaq=[['_setAccount','UA-6839756-2'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>

		<!-- Piwik Tracking Code -->
		<script type="text/javascript">
			var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.bandbreed.nl/" : "http://piwik.bandbreed.nl/");
			document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
		</script><script type="text/javascript">
			try { var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 18);
				piwikTracker.trackPageView();
				piwikTracker.enableLinkTracking(); } catch( err ) {}
		</script><noscript><p><img src="http://piwik.bandbreed.nl/piwik.php?idsite=18" style="border:0" /></p></noscript>
		<!-- End Piwik Tracking Code -->

		<!--[if lt IE 7 ]>
			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
			<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
		<![endif]-->

	</body>
</html>






