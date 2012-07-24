	
	
			<footer id="footerwrapper" class="alignwrapper">
				<div class="alignleft">
					<a href="<?php echo home_url( '/' ); ?>?device=desktop">
						<p>
							<span>Desktop weergave</span>
							<br />
							<?php bloginfo('name'); ?> >
						</p>
					</a>
				</div>
				<div class="alignright">
					<p>
						&copy; <?php echo date("Y"); ?>
						<br />
						Bandbreed
					</p>
				</div>
			</footer>
		
			<?php wp_footer(); ?>
		
		</div><!-- sitewrapper -->
		
		<!-- Load jQuery and custom plugins/scripts -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
			<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
			<script>window.jQuery || document.write('<script src="<?php bloginfo("template_url");?>/scripts/libs/jquery-ui.min.js"><\/script>')</script>
			<script src="<?php bloginfo("template_url");?>/scripts/script.js"></script>
			
		<!-- Google Analytics code -->
			
		  <script>
			var _gaq=[["_setAccount","UA-REPLACE"],["_trackPageview"]];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
			s.parentNode.insertBefore(g,s)}(document,"script"));
		  </script>

	</body>
</html>






