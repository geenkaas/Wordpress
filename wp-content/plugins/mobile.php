<?php
/*
Plugin Name: GRANVILLE MOBILE
Plugin URI: http://www.ranville.nl
Description: This plugin will serve the mobile theme.
Author: Edward Granville
Author URI: http://www.granville.nl/
Version: 1.0
*/

add_filter( 'pre_option_stylesheet', 'my_get_new_theme' );
add_filter( 'pre_option_current_theme', 'my_get_new_theme' );

add_filter( 'template', 'my_get_new_theme' );
add_filter( 'stylesheet', 'my_get_new_theme' );

function my_get_new_theme() {
	
	// Switch device on request
	if (isset($_GET['device'])) {
		$_SESSION['device'] = $_GET['device'];
	}
	
	// Set standard theme
	$theme = 'geenkaas';
	$mobileTheme = 'mobile';
	
	if ( !isset($_SESSION['device']) ) {
		
		$mobile_browser = '0';
		
		// Start checking devices
		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$mobile_browser++;
		}
		 
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$mobile_browser++;
		}    
		 
		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		$mobile_agents = array(
			'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
			'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
			'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
			'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
			'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
			'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
			'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
			'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
			'wapr','webc','winw','winw','xda ','xda-');
		 
		if (in_array($mobile_ua,$mobile_agents)) {
			$mobile_browser++;
		}
		 
		if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
			$mobile_browser++;
		}
		 
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
			$mobile_browser = 0;
		}
		
		
		// Take action based on result
		if ($mobile_browser > 0) {
		   // Set $_SESSION
		   $_SESSION['device'] = 'mobile';
		   return $mobileTheme;
		}
		else {
		   // do something else
		   $_SESSION['device'] = 'other';
		   return $theme;
		}		
		
	} elseif ($_SESSION['device'] == 'mobile') {
		
		// Return mobile theme
		return $mobileTheme;
		
	} else {
		
		// Return standard
		return $theme;
	
	}
	
}
?>