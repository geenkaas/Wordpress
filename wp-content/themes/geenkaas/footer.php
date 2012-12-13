			</div><!-- End bodywrapper -->
		</div><!-- sitewrapper -->

		<footer id="footerwrapper">
			<p>
				All rights reserved <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
			</p>
		</footer>

		<div id="background"></div>

    <!--[if lt IE 9]>
        <div class="chromeframe">You are using an <strong>ancient</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
    <![endif]-->

		<?php wp_footer(); ?>

		<!-- Load jQuery and custom plugins/scripts -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="scripts/jquery-1.8.2.min.js"><\/script>')</script>
			<script src="<?php bloginfo("template_url");?>/scripts/script.js"></script>

		<!-- Google Analytics code -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXXX'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

	</body>
</html>






