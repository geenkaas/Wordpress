<?php
define('DB_NAME', 'dbcustomer');
define('DB_USER', 'customerdbadmin');
define('DB_PASSWORD', 'replace');

define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// https://api.wordpress.org/secret-key/1.1/salt/


$table_prefix  = 'replace_';
define('WPLANG', '');
define('WP_DEBUG', false);

if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
