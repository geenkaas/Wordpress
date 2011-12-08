<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="nl"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="nl"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="nl"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="nl"><!--<![endif]-->
	<head>
		<!-- Meta information -->
			<meta charset="<?php bloginfo('charset'); ?>">
			<meta name="description" content="<?php bloginfo('description'); ?>">
			<meta name="author" content="Bandbreed">
			<meta name="viewport" content="width=960,user-scalable=no,initial-scale=1"/>
			
		<!-- Title and link info -->
			<title><?php wp_title('');?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); ?><?php if(is_home()) { echo ' | ' ; } ?><?php if(is_home()) { bloginfo('description') ; } ?></title>
			<link rel='index' title='<?php bloginfo('name'); ?>' href='<?php echo home_url( '/' ); ?>' />
			
		<!-- Stylesheets -->
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_url");?>" />
			
		<!-- Pingback -->
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
			
		<!-- Bringing old browsers up to date -->
			<script src="<?php bloginfo("template_url");?>/scripts/libs/modernizr-2.0.6.min.js"></script>
			
		<?php wp_head(); ?>
		
	</head>
	<body>
		<div id="sitewrapper">
		
			<header>
				<div id="headerwrapper" role="banner">
					<div id="logowrapper">
						<a href="<?php echo home_url( '/' ); ?>" title="Terug naar de <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> Homepage" rel="home">
							<h1 id="logo"><?php bloginfo('name'); ?>, <?php bloginfo('description'); ?></h1>
						</a>
					</div><!-- End logowrapper -->
					<nav id="navwrapper" role="navigation">
						<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'bandbreed' ); ?>"><?php _e( 'Skip to primary content', 'bandbreed' ); ?></a>
						<?php wp_nav_menu( array('menu' => 'hoofdmenu' )); ?>
					</nav><!-- End nav -->
					<div id="breadcrumbs" role="navigation"><?php get_breadcrumbs(); ?></div>
				</div><!-- End headerwrapper -->
			</header>
			
			<div id="bodywrapper">