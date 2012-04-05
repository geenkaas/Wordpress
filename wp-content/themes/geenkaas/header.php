s<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="nl"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="nl"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="nl"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="nl"><!--<![endif]-->
	<head>
		<!-- Meta information -->
			<meta charset="<?php bloginfo('charset'); ?>">
			<meta name="description" content="<?php bloginfo('description'); ?>">
			<meta name="author" content="Bandbreed">
			<meta name="viewport" content="width=940">
			
		<!-- Title and link info -->
			<title dir="ltr"><?php wp_title('');?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); ?><?php if(is_home()) { echo ' | ' ; } ?><?php if(is_home()) { bloginfo('description') ; } ?></title>
			<link rel='index' title='<?php bloginfo('name'); ?>' href='<?php echo home_url( '/' ); ?>' />
			
		<!-- Stylesheets -->
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_url");?>" />
			
		<!-- Pingback -->
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
			
		<!-- Bringing old browsers up to date -->
			<script src="<?php bloginfo("template_url");?>/scripts/libs/modernizr-2.5.3.min.js"></script>
			
		<?php wp_head(); ?>
		
	</head>
	<body>
		<div id="sitewrapper">
		
			<header>
				<div id="headerwrapper" role="banner">
					<div id="logowrapper">
						<a href="<?php echo home_url( '/' ); ?>" title="Terug naar de <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> Homepage" rel="home">
							<h1 id="logo"><?php bloginfo('name'); ?></h1>
							<h2 class="blogtitle"><?php bloginfo('description'); ?></h2>
						</a>
					</div><!-- End logowrapper -->
				</div><!-- End headerwrapper -->
			</header>
			
			<div id="bodywrapper">